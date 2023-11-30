/*------login and sign up------ */
function closeModal(){
    document.getElementById("modal-slide").style.display = "none";
}

function openModal(){
    document.getElementById("modal-slide").style.display = "block";
}

function closeLogin(){
    document.getElementById("modal-login").style.display = "none";
}

function openLogin(){
    document.getElementById("modal-login").style.display = "block";
}

var i;


function showInterface(open,close){
    close.style.display = "none";
    open.style.display = "block";
}

function checkEmpty(n){
    let childlength = n.parentNode.childElementCount;
    if(childlength!= 1){
        for(let i=1;i<childlength;i++){
            n.parentNode.removeChild(n.parentNode.lastElementChild);
        }
    }
    if( n.value == ""){
        let empty_warning = document.createElement("span");
        empty_warning.classList.add("empty");
        empty_warning.textContent = "* must be filled";
        insertAfter(empty_warning,n);
        n.style.border = "3px solid red";
    }
    else{
        if(n.invalid == true){
            n.style.borderColor = "red";
            n.style.borderWidth = "3px";
            return false;
        }
        n.style.borderColor = "grey";
        n.style.borderWidth = "1px";
    }
}
function insertAfter(newNode, existingNode) {
    existingNode.parentNode.insertBefore(newNode, existingNode.nextSibling);
}
function verifyCode(n){
    let input_value = document.getElementById("resetcode").value;
    let input = document.getElementById("resetcode");
    let text = n.getElementsByTagName("span")[0];
    if(input_value == ""){
        text.innerHTML = "<br>Please enter your code";
        return false;
    }
    if(isNaN(input_value)){
        let empty_warning = document.createElement("span");
        empty_warning.classList.add("empty");
        empty_warning.textContent = "* enter numbers";
        insertAfter(empty_warning,input);
        input.style.border = "3px solid red";
    }
    else if(input_value != 123456){
        let empty_warning = document.createElement("span");
        empty_warning.classList.add("empty");
        empty_warning.textContent = "* Code does NOT match";
        insertAfter(empty_warning,input);
        input.style.border = "3px solid red";
    }
    else{
        showInterface(i4,i3);
    }
}
function clicked(n){
    n.style.color = "#cc0066";
}
function verifyPassword(){
    let first_input = document.getElementById("pin1");
    let second_input = document.getElementById("pin2");

    let first = first_input.value;
    let second = second_input.value;

    if (first != second){
        let empty_warning = document.createElement("span");
        empty_warning.classList.add("empty");
        empty_warning.textContent = "* Password does NOT match";
        insertAfter(empty_warning,first_input);
        document.getElementById("reset").reset();
        return false;
    }
    else{
        return true;
    }
}

function checkValid(){
    if(verifyPassword()){
        showInterface(i5,i4);
        document.getElementById("goHome").innerHTML = "Will return to home in "+ 5 +" s";
        setCookie("username","sam",1);
        setTimeout(returnHome,5000);
    }
}

function waitReturnHome(){
    setTimeout(returnHome,5000);
}
function waitPreviousPage(){
    setTimeout(returnPreviousPage,3000);
}

function returnHome(){
    window.open("../storefront/home.html","_self");
}
function returnPreviousPage(){
    window.open(getCookie('savedpage'),"_self");
}

function login(cname,cvalue,day){
    setCookie(cname,cvalue,day);
    window.open("../storefront/home.html","_self");
}
    
function setCookie(cname,cvalue,exdays) {
    const d = new Date();
    d.setTime(d.getTime() + (exdays*24*60*60*1000));
    let expires = "expires=" + d.toUTCString();
    document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
  }
  
  function getCookie(cname) {
    let name = cname + "=";
    let decodedCookie = decodeURIComponent(document.cookie);
    let ca = decodedCookie.split(';');
    for(let i = 0; i < ca.length; i++) {
      let c = ca[i];
      while (c.charAt(0) == ' ') {
        c = c.substring(1);
      }
      if (c.indexOf(name) == 0) {
        return c.substring(name.length, c.length);
      }
    }
    return "";
  }
  
  function checkUser() {
    let loginWindow = document.getElementById("userLogOuted");
    let userWindow = document.getElementById("userLogined");

    let user = getCookie("username");
    if (user != "") {
        loginWindow.style.display = "none";
        userWindow.style.display = "block";
        document.getElementById('nav-user').innerHTML = "Hi, "+ user;
    } else {
        loginWindow.style.display = "block";
        userWindow.style.display = "none";
    }
    
  }
  function logOut(){
    document.cookie = "username=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;";
    document.cookie = "userid=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;";
    document.cookie = "address=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;";
    document.cookie = "city=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;";
    document.cookie = "country=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;";
    document.cookie = "fullname=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;";
    document.cookie = "state=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;";
    document.cookie = "zip=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;";

    for(var i=0;i<20;i++){
        document.cookie = i+"=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;";
    }
    window.open("../storefront/home.html","_self");
  }

  function deleteAllCookies() {
    for(var i = 0;i<document.cookie.split(';').length;i++){
        var name = getCookieName[i];
        document.cookie = name+"=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;";
    }
}

function myFunction() {

  var checkBox = document.getElementById("myCheck");

  var form = document.getElementById("form");

  if (checkBox.checked == true){
    text.style.display = "block";
  } else {
    text.style.display = "none";
  }
}

/*-------add to cart------- */

//it takes four parameters:( productid, productname, price, imgsrc )
function addToCart(productid, productname, price, imgsrc){
    var setarray = [productname, price, imgsrc, 1];

    var getarray = getCookie(productid);
    if(getarray != ''){
        var splitarray = getarray.split(",");
        setarray[3] = Number(splitarray[3])+1;
    }
    setCookie(productid,setarray,7);
    checkCart();
}
function modifyCart(productid,action){
    var getarray = getCookie(productid);
    console.log(getarray);

    if(getarray != ''){
        var splitarray = getarray.split(",");
        var setarray = [splitarray[0], splitarray[1], splitarray[2], splitarray[3]];
    
        if(action == 0 && Number(splitarray[3])>1){
            setarray[3] = Number(splitarray[3])-1;
            document.getElementById(productid+"quantity").innerHTML = setarray[3];
        }
        if(action == 1){
            setarray[3] = Number(splitarray[3])+1;
            document.getElementById(productid+"quantity").innerHTML = setarray[3];
        }
    }
    setCookie(productid,setarray,7);
    checkCart();
}

function checkIfLogin(a,b,c,d){
    if(getCookie('username')== ''){
        window.open("../storefront/login.php","_self");
        saveURL();
    }
    else{
        addToCart(a,b,c,d);
    }
    
}

function saveURL(){
    setCookie('savedpage',window.location.href,7);
}

function getCookieName(n){
    var cookieLine = document.cookie.split(';')[n];
    var trimCookieArray = cookieLine.replace('=',',');
    var trimCookieArray = trimCookieArray.trim();
    var cookieArray = trimCookieArray.split(',');
    var cookieName = cookieArray[0];
    return cookieName;
    //isANumber = !isNaN(cookieArray[0]);
    //return isANumber;
}

    /*var cookieLine = document.cookie.split(';')[2];
    var trimCookieArray = cookieLine.replace('=',',');
    var trimCookieArray = trimCookieArray.trim();
    var cookieArray = trimCookieArray.split(',');*/
    //console.log(cookieArray);
    //console.log(cookieArray[0]);
    //console.log(!isNaN(cookieArray[0]));
    //isANumber = !isNaN(cookieArray[0]);
    //console.log(isANumber);
    //console.log(document.cookie.split(';').length);


// n is product id. The id is preseted.
function getProduct_ImgSrc(n){
    var imgsrc = getCookie(n).split(',')[2];
    return imgsrc;
}

function getProduct_Name(n){
    var name = getCookie(n).split(',')[0];
    return name;
}

function getProduct_price(n){
    var price = getCookie(n).split(',')[1];
    return price;
}
function getProduct_quantity(n){
    var quantity = getCookie(n).split(',')[3];
    return quantity;
}

function checkCart(){
    if(getCookie('username')!=''){
        var cookieLength = document.cookie.split(';').length;
        //console.log(cookieLength);

        var itemsNumber = 0;
        for (var i = 0; i < cookieLength; i++) {
            var cookieLine = document.cookie.split(';')[i];
            var trimCookieArray = cookieLine.replace('=', ',');
            var trimCookieArray = trimCookieArray.trim();
            var cookieArray = trimCookieArray.split(',');
            var cookieName = cookieArray[0];

            var isANumber = !isNaN(cookieName);

            if(isANumber){
                itemsNumber += Number(getProduct_quantity(cookieName));
            }
        }
        document.getElementById('cartNumber').innerHTML = '('+itemsNumber+')';
    }
}

function loadAddress(){
    var checkBox = document.getElementById('getAddress');
    if(checkBox.checked == true){
        var cvalue = getCookie('fullname');
        document.getElementById("shipping-name").value = cvalue;
        var cvalue = getCookie('address');
        document.getElementById("shipping-address").value = cvalue;
        var cvalue = getCookie('city');
        document.getElementById("shipping-city").value = cvalue;
        var cvalue = getCookie('state');
        document.getElementById("shipping-state").value = cvalue;
        var cvalue = getCookie('zip');
        document.getElementById("shipping-zipcode").value = cvalue;
        var cvalue = getCookie('country');
        document.getElementById("shipping-country").value = cvalue;
    }
    else{
        var inputArray = document.getElementById('shipping-info').getElementsByTagName('input');
        for(var i=0; i< inputArray.length;i++){
            inputArray[i].value = '';
        }
    }
}

function removeItem(n){
    document.getElementById(n).style.display = "none";
    setCookie(n,"",-1);
}
function checkLoginStatus(n){
    if(getCookie('username')==''){
        window.open("../storefront/login.php","_self");
    }
    else{
        window.open(n,"_self");
    }
}