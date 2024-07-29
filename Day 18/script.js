let homeSection = document.querySelector(".home");
let profileSection = document.querySelector(".profile");
let settingsSection = document.querySelector(".settings");

let homeBtn = document.getElementById("home");
let profileBtn = document.getElementById("profile");
let settingsBtn = document.getElementById("settings");
let editBtn = document.getElementById("editBtn");

function hideAllSections() {
    homeSection.style.display = "none";
    profileSection.style.display = "none";
    settingsSection.style.display = "none";
}

hideAllSections();

function showSection(section) {
    hideAllSections();
    section.style.display = "flex";
}

showSection(profileSection);
showSection(settingsSection);
showSection(homeSection);

function removeActiveState() {
    document.querySelectorAll("li").forEach(list => {
        list.classList.remove("active")
    });
};

document.querySelectorAll("li").forEach(listItem => {
    listItem.addEventListener("click", () => {
        removeActiveState();
        listItem.classList.add("active");
    })
})

homeBtn.addEventListener("click", () => {
    showSection(homeSection);
});


profileBtn.addEventListener("click", () => {
    showSection(profileSection);
});

editBtn.addEventListener("click", () => {
    showSection(settingsSection);
    removeActiveState();
    settingsBtn.classList.add("active");
});

settingsBtn.addEventListener("click", () => {
    showSection(settingsSection);
});