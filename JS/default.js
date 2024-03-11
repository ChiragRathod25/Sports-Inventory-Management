if(window.location.href.includes('chiragrathod25.github.io')){
const addRootRepo=document.querySelectorAll('a');
const repoName='/Sports-Inventory-Management';
for(let i=0;i<addRootRepo.length; ++i){
let val=addRootRepo[i].getAttribute('href');
val = repoName+val;
addRootRepo[i].setAttribute('href', val)
}

}
