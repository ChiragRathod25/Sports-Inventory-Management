let addbtn=document.querySelector(".add-btn");
let tbl=document.querySelector(".tbl");
let con=document.querySelector(".container");
addbtn.addEventListener('click',()=>{
    add();
})

function add()
{
    let pera=document.createElement("p");
    let in1=document.createElement("input");
    in1.setAttribute("placeholder","Enter Id");
    in1.style.border="2px solid black";
    in1.style.borderRadius="2px";
    in1.style.fontSize="20px";
    in1.style.marginTop="10px";
    con.removeChild(addbtn);
    tbl.after(in1);
}