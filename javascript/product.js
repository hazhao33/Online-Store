function closeModal(){
    document.getElementById("modal-slide").style.display = "none";
}

function openModal(){
    document.getElementById("modal-slide").style.display = "block";
}


function changePreview(n){
    const img = n.src;
    document.getElementById("preview-area").src = img;
}

var slideIndex = 1;
 
function currentSlide(n){
    showPreview(slideIndex = n);
}

function plusDivs(n){
    showPreview(slideIndex += n);
    plusValue = n;
}
var plusValue = 0;

function showPreview(n) {
    var i;
    let slides = document.getElementsByClassName("myPreviews");
    let index = document.getElementsByClassName("index");
    if (n > slides.length) {slideIndex = 1}
    if (n < 1) {slideIndex = slides.length}
    for (i = 0; i < slides.length; i++) {
        slides[i].style.display = "none";
        index[i].classList.remove("active");
    }
    slides[slideIndex-1].style.display = "block";
    index[slideIndex-1].classList.add("active");
  }

function showMore(){
    document.getElementById("more").style.display = "block";
}

