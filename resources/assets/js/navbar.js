window.onload = function () {
    let navbarBottom = document.querySelector('.navbar-bottom');

    document.querySelector('.aj-navbar-left').addEventListener('click', function () {
        document.querySelector('.background-black-nav').style.display = 'block';
        navbarBottom.style.transition = 'all .2s linear';
        navbarBottom.style.width = '300px';
        setTimeout(function () {
            navbarBottom.style.transition = 'none';
        }, 200);
    });

    document.querySelector('.close-nav').addEventListener('click', function (event) {
        event.preventDefault();
        document.querySelector('.background-black-nav').style.display = 'none';
        navbarBottom.style.transition = 'all .2s linear';
        navbarBottom.style.width = '0';
        setTimeout(function () {
            navbarBottom.style.transition = 'none';
        }, 200);
    });

    window.addEventListener('scroll', function (event) {
        let width = window.innerWidth;
        if (width >= 768) {
            if (event.target.scrollingElement.scrollTop >= 79) {
                navbarBottom.classList.add('navbar-fixed');
            } else {
                navbarBottom.classList.remove('navbar-fixed');
            }
        }
    });
}