// TO HIDE AND VIEW BALANCE
const balance = document.querySelector("#balance");
const visibility = document.querySelector("#visibility");

visibility.addEventListener("click", () => {

    visibility.classList.toggle("ti-eye");
    visibility.classList.toggle("ti-eye-off");
    let text = balance.textContent;
        
    if (visibility.classList.contains("ti-eye-off")) {
        text = "******";
    } else if (visibility.classList.contains("ti-eye")) {
        text = "$2,000.09"; // Replace with actual balance
    };

    balance.innerHTML = text;
});

// FUNCTION TO COPY ACCOUNT NUMBER
document.getElementById("CopyIcon").addEventListener("click", () => {
    navigator.clipboard.writeText(document.getElementById("accId").textContent);
    document.querySelector(".copied").style.display = "block";
    setTimeout(() => {
        document.querySelector(".copied").style.display = "none";
    }, 5000);
});
