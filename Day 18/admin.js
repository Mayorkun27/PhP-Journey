let homeSection = document.querySelector(".home");
let allStudentsSection = document.querySelector(".allstudents");

let homeBtn = document.getElementById("home");
let studentsBtn = document.getElementById("students");

function hideAllSections() {
    homeSection.style.display = "none";
    allStudentsSection.style.display = "none";
}

hideAllSections();

function showSection(section) {
    hideAllSections();
    section.style.display = "flex";
};

showSection(homeSection);
showSection(allStudentsSection);

function removeActiveState() {
    document.querySelectorAll("li").forEach(list => {
        list.classList.remove("active")
    });
};

document.querySelectorAll("li").forEach(listItem => {
    listItem.addEventListener("click", () => {
        removeActiveState();
        listItem.classList.add("active");
    });
});

homeBtn.addEventListener("click", () => {
    showSection(homeSection);
});

studentsBtn.addEventListener("click", () => {
    showSection(allStudentsSection);
});