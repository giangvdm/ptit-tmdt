var tabPanes = document.getElementsByClassName("tab-pane");
var firstTabPane = tabPanes[0];

// Initiate
firstTabPane.classList.add('active');

// Script for toggling tab panes
var tabTogglers = document.getElementsByClassName("js-tab-toggle");

for (var i = 0; i < tabTogglers.length; i++) {
    tabTogglers[i].addEventListener("click", function() {
        for (var j = 0; j < tabPanes.length; j++) {
            tabPanes[j].classList.remove('active');
        }

        var target = this.getAttribute("href").substring(1);

        document.getElementById(target).classList.add('active');
        // console.log(target);
    });
}