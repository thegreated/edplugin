window.addEventListener("load", function(){

    var tabs = this.document.querySelectorAll("ul.nav-tabs > li");
    
    for(i=0; i < tabs.length; i++){
        tabs[i].addEventListener("click",switchTab);
    }

    function switchTab(event){
        event.preventDefault();
        document.querySelector("ul.nav-tabs li.active").classList.remove("active");
        document.querySelector(".tab-pane.active").classList.remove("active");

        var clickTab =  event.currentTarget;
        var anchor = event.target;
        var activePaneId = anchor.getAttribute("href");
       
        clickTab.classList.add("active");
        document.querySelector(activePaneId).classList.add("active");

    }

});