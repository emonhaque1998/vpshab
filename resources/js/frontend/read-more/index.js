import ReadClasses from "./ReadClasses";

const readMore = new ReadClasses();

if (readMore.supportBtn) {
    readMore.supportBtn.forEach((e, index) => {
        e.addEventListener("click", (event) => {
            event.preventDefault();
            readMore.readMoreSupport(index);
        });
    });
}
