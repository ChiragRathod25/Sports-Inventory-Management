console.log("here");
window.addEventListener('load', function(e) {
// console.log('Page fully loaded');
// console.log(e);
const xhr=new XMLHttpRequest();
xhr.open('POST','/Sports-Inventory-Management/PHP/Team Sports/getDetails.php');
console.log('here');
xhr.onreadystatechange= function(){
    console.log(xhr.readyState);
    if(xhr.readyState===4){
        const data=this.responseText;
        // const data = JSON.parse(this.responseText);
        // console.log(data.childPropertyName); // Replace 'childPropertyName' with the actual property name
        document.querySelector('section').innerHTML=data;
    }
}; //to check ready state continuesly
xhr.send();
// Perform actions after the entire page has loaded
console.log('completed');
});