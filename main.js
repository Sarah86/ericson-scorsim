const homepage = document.querySelector(".home");
const postsContainer = document.querySelector('#posts-container');
const infoContainer = document.querySelector('#info-container');
const postModalAll = document.querySelectorAll('.posts_modal');
const postBoxAll = document.querySelectorAll('.posts_box');

//Inject the modal url in the address bar
const ChangeUrl = (title, url) => {
    var obj = { 
        Title: title, 
        Url: url 
      };
      
    if (history.pushState != "undefined") {
        history.pushState(obj, obj.Title, obj.Url)
    }
}

//Change opacity when scroll the content in homepage
const changeOpacityWhenScroll = () => {
    postsContainer.addEventListener('scroll', () => {
        const scrollPositionX = postsContainer.scrollLeft;
        const changedOpacityRelativeToX = "opacity:" + (1 - scrollPositionX/150);
  
        infoContainer.setAttribute("style", changedOpacityRelativeToX);
    })
}

//Change buttons and scroll behavior for homepage
const pressingDownScrollToRight = () => {
    if (homepage) {
        document.addEventListener('keydown', (event) => {
            (event.key == "ArrowDown" || event.key == "ArrowRight" ) ? postsContainer.scrollBy(50, 0) 
            : (event.key == "ArrowUp" || event.key == "ArrowLeft" ) ? postsContainer.scrollBy(-50, 0) 
            : event
        });
    }    
}

//Push history back: 
const pushHistoryBack = () => {
    window.history.back();
}

//Remove class active from the modal with timeout
const removeActiveClass = () => {
    const activePostModal = document.querySelector('.posts_modal.active');
    activePostModal.classList.add('closing');
    setTimeout(() => {
        activePostModal.classList.remove('closing');
        activePostModal.classList.remove('active');
    }, 500);
}

//Inject the URL to the address bar
const injectUrl = () => {
    postBoxAll.forEach(box => {
        box.addEventListener('click', () => {
            const titulo = document.querySelector('h2').innerHTML;
            const modalLink = box.getAttribute('to');
            ChangeUrl(titulo, modalLink);
        })
    })
}

//Add active class to the modal when press the button
const addOpeningClass = () => {
    postBoxAll.forEach(box => {
        box.addEventListener('click', () => {
            box.querySelector('.posts_modal').classList.add('active');
        })
    })
}

// Close the modal when hit the back button
const closeModalWhenPressBack = () => {
    window.addEventListener('popstate', () => {
        removeActiveClass();
    }, false)  
}

 //When press the modal close button, change the url to the previous one
 const pressCloseHistoryBack = () => {
   postModalAll.forEach(modal => {
        const modalCloseButton = modal.querySelector('.posts_button-close');
        modalCloseButton.addEventListener('click', () => {
            removeActiveClass();
            pushHistoryBack();
        })
    });
}

(function() {
    addOpeningClass();
    injectUrl();
    pressingDownScrollToRight();
    changeOpacityWhenScroll();
    closeModalWhenPressBack();
    pressCloseHistoryBack();
 })();