$('.owl-carousel').owlCarousel({
    loop: true,
    margin: 10,
    nav: true,
    responsive: {
        0: {
            items: 1
        },
        600: {
            items: 2
        },
        1000: {
            items: 4
        }
    }
})


const tabBtns = document.querySelectorAll('.list-item');
const tabPages = document.querySelectorAll('.page');

function openLink(btn, linkName) {

    // active button

    tabBtns.forEach(item => item.classList.remove('active'));
    btn.classList.add('active');

    // active tab content
    
    tabPages.forEach(item => item.classList.remove('show'));
    const currentPage = document.querySelector('#' + linkName);
    currentPage.classList.add('show');
   
}


function activeTabByURL (){
    const urlSearchParams = new URLSearchParams(window.location.search);
    const params = Object.fromEntries(urlSearchParams.entries());
    if(params && params.tab){
         console.log('#btn-' + params.tab,'tab');
        const btn = document.querySelector('#btn-' + params.tab);
        console.log(btn,'activeTabByURL');
        openLink(btn,params.tab);
    }
}


activeTabByURL();


const modalOne = document.querySelector('#modal-1');
const modalTwo = document.querySelector('#modal-2');
const modalThree = document.querySelector('#modal-3');
const modalFour = document.querySelector('#modal-4');
const modalFive = document.querySelector('#modal-5');

function showModalOne() {
    modalOne.style.display = 'flex';
}

function showModalTwo() {
    console.log('modal tưo');
    console.log(modalTwo);
    modalTwo.style.display = 'flex';
}

function showModalThree() {
    modalThree.style.display = 'flex';
}

function showModalFour() {
    modalFour.style.display = 'flex';
}

function showModalFive() {
    modalFive.style.display = 'flex';
}

function closeModal(){
    const modalCloseBtns = document.querySelectorAll('.modal-close');
    modalCloseBtns.forEach(item => {
        item.addEventListener('click', function(){
            modalOne.style.display = 'none';
            modalTwo.style.display = 'none';
            modalThree.style.display = 'none';
            modalFour.style.display = 'none';
            modalFive.style.display = 'none';
        })
    })
}

closeModal();



var showSB = false;

function showSideBar(){
    var eleSideBar = document.querySelector('.responsive-menu');

    if(showSB){
        eleSideBar.classList.remove('active');
        showSB = false;
    }
    else{
        eleSideBar.classList.add('active');
        showSB = true;
    }
}