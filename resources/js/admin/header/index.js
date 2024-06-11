import HeaderClasses from "./HeaderClasses";

const headerInfo = new HeaderClasses();

// Logout Request
if (headerInfo.logutBtn) {
    headerInfo.logutBtn.addEventListener("click", (e) => {
        e.preventDefault();
        headerInfo.logOutRequest();
    });
}
