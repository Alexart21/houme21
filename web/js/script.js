const screen_w = document.body.clientWidth;
const al = document.querySelector('.wrap').clientWidth; // ширина контентного блока

jQuery(document).ready(function($) {

    $(window).scroll(function(){
        $('.main-header').toggleClass('scrolled', $(this).scrollTop() > 1);
    });


    window.addEventListener('scroll', function () {
        var menu = document.getElementById('menu-wrapper');
        var top = window.pageYOffset; // сколько проскролено
        if (top > 0) {
            menu.style.opacity = '1';
        } else {
            menu.style.opacity = '.7';
        }
    });

    $('a[href="#top"]').click(function(){
        $('html, body').animate({scrollTop: 0}, 'slow');
        return false;
    });


    $('.flexslider').flexslider({
        slideshow: true,
        slideshowSpeed: 3000,
        animation: "fade",
        directionNav: false,
    });


    $('.toggle-menu').click(function(){
        $('.menu-first').toggleClass('show');
        // $('.menu-first').slideToggle();
    });

    $('.menu-first li a').click(function(){
        $('.menu-first').removeClass('show');
    });


    /************** LightBox *********************/
    $(function(){
        $('[data-rel="lightbox"]').lightbox();
    });

/* MENU */
    var scr_w=document.body.clientWidth;
    if (scr_w > 991) {
        $('li.dropdown').hover(function() {
            $(this).find('.dropdown-menu').stop(true, true).delay(200).fadeIn(500);
        }, function() {
            $(this).find('.dropdown-menu').stop(true, true).delay(200).fadeOut(500);
        });
    }else{
        $('.menu-first').remove();
        $('.toggle-menu').append('<ul class="menu-first"><li><a href="/">Главная</a></li><li class="pjax"><a rel="nofollow" href="/contact">контакты</a></li><li><a href="/galery/exterieur">экстерьер</a></li><li><a href="/galery/interieur">интерьер</a></li><li><a href="/galery/racks">гардеробные</a></li><li><a href="/galery/kupe">шкафы купе</a></li><li><a href="/galery/kitchen">кухни</a></li></ul>');
    }
});
/* Вращаем контактные иконки  */
var spiner = document.querySelector('.fa-phone');
document.querySelector('.tel-number').addEventListener('mouseover', function () {
    spiner.style.textShadow = '1px 1px 0 #e61b05';
    spiner.classList.add('rotate');
});

document.querySelector('.tel-number').addEventListener('mouseout', function () {
    spiner.style.textShadow = '';
    spiner.classList.remove('rotate');
});


var spiner2 = document.querySelector('.fa-envelope');
document.querySelector('.mail-namber').addEventListener('mouseover', function () {
    spiner2.style.textShadow = '0 1px 0 #e61b05';
    spiner2.classList.add('rotate');
});

document.querySelector('.mail-namber').addEventListener('mouseout', function () {
    spiner2.style.textShadow = '';
    spiner2.classList.remove('rotate');
});
/*конец Вращаем контактные иконки  */
/* Знак рубль */
var r = document.getElementsByClassName('rubl');
for (var i = 0; i < r.length; i++) {
    var rub = r[i].innerHTML;
    rub = rub.replace('руб.', '<span class="rub_img"></span>');
    r[i].innerHTML = rub;
}
/* конец Знак рубль */
/**/
/////////////
/* Далее в обертке window.onload */
window.onload = () => {
    // Окно чата/мессенджеров
    let msgBlock = document.getElementById('msg-block'),
        msgContent = document.getElementById('msg-content'),
        msgImg = document.querySelector('.msg-img'),
        msgClosed = document.querySelector('.msg-closed');

    msgBlock.style.right = (screen_w - al) / 2 + 'px'; //позиционируем в правый край родителя

    function showMsg() { // показ окна чата с анимацией
        $('#msg-block').velocity('transition.bounceIn');;
    }

    setTimeout(showMsg, 3000); // задерживаем на 3 с.

    msgContent.addEventListener('click', () => { // разворачиваем окно чата
        if (msgBlock.hasAttribute('data-closed')) { // свернуто
            msgBlock.style.height = '420px';
            msgBlock.style.background = 'url(/img/wats-bg.gif)';
            msgBlock.style.boxShadow = '0 0 30px #999';
            msgImg.style.left = '120px';
            msgClosed.style.display = 'none';
            msgBlock.removeAttribute('data-closed');
            showMsg();
        }
    });
    //
    const msgClose = document.querySelector('#msg-block button');
    msgClose.addEventListener('click', () => { // сворачиваем окно чата
        if (!msgBlock.hasAttribute('data-closed')) { // окно не свернуто
            msgImg.style.left = '240px';
            msgBlock.style.height = '';
            msgBlock.style.background = '';
            msgBlock.style.boxShadow = '';
            msgClosed.style.display = '';
            msgBlock.setAttribute('data-closed', '');
        }
    });
    //
}
//
$(document).on('pjax:beforeSend', function () {
    document.body.style.cursor = 'progress';
    $('#container_loading').show(); // loader
});
$(document).on('pjax:complete', function () {
    const back = document.querySelector('.modal-backdrop'); // overlay
    back.style.width = al + 8 + 'px';
    back.style.margin = '0 auto'; // затемняем только контентную часть
    document.body.style.cursor = 'default';
    $('#container_loading').hide();
});
/* кнопка наверх */
const scr = document.getElementById('scroller');
scr.style.paddingLeft = (screen_w - al)/2 + 20 + 'px'; //позиционируем

window.addEventListener('scroll', () => {
    let top = window.pageYOffset; // сколько проскролено
    if (top > 500) {
        scr.style.display = 'block';
    } else {
        scr.style.display = 'none';
    }
});
scr.addEventListener('click', () => {
    window.scrollTo(0, 0);
});
