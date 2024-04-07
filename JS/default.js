console.log("loaded");
if (window.location.href.includes("chiragrathod25.github.io")|| window.location.href.includes("localhost")) {
  console.log("inside loaded");
  const addRootRapo = document.querySelectorAll("a");
  const repoName = "/Sports-Inventory-Management";
  for (let i = 0; i < addRootRapo.length; i++)  {
    let val = addRootRapo[i].getAttribute("href");
    console.log('not changed')
    if (val != "" || val != "#") {
      val = repoName + val;
      addRootRapo[i].setAttribute("href", val);
      console.log('changed');
    }
  }
  console.log('after loop')
}

