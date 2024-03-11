console.log("loaded");
if (window.location.href.includes("chiragrathod25.github.io")) {
  console.log("inside loaded");
  const addRootRapo = document.querySelectorAll("a");
  const repoName = "/Sports-Inventory-Management";
  for (let i = 0; i < addRootRapo.length; i++) {
    let val = addRootRapo[i].getAttribute("href");
    if (val != "" || val != "#") {
      val = repoName + val;
      addRootRapo[i].setAttribute("href", val);
    }
  }
}
