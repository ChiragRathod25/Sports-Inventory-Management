if(window.location.href.includes('chiragrathod25.github.io')){
  const addRootRapo=document.querySelectorAll('a')
const repoName='/Sports-Inventory-Management';
for(let i=0;i<addRootRapo.length;i++){
    let val=addRootRapo[i].getAttribute('href');
    val=repoName+val;
    addRootRapo[i].setAttribute('href',val)
}
}
