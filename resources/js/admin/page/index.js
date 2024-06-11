import PageClasses from "./PageClasses";

const pageInfo = new PageClasses();
// Add Category Request

if (pageInfo.websiteVedioForm) {
    pageInfo.websiteVedioForm.addEventListener("submit", async (e) => {
        e.preventDefault();
        pageInfo.addVedio();
    });
}
