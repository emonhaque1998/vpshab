import CategoryClasses from "./CategoryClasses";

// Add Category Request
const addCategoryForm = document.querySelector("#categorySubmitForm");
const category = new CategoryClasses();

if (category.categoryForm) {
    category.categoryForm.addEventListener("submit", (e) => {
        e.preventDefault();
        category.storeCategory(addCategoryForm);
    });
}

// View Category Request
const categoryViewsBtn = document.querySelectorAll("#categoryView");

if (categoryViewsBtn) {
    categoryViewsBtn.forEach((edit) => {
        edit.addEventListener("click", (e) => {
            e.preventDefault();
            category.viewCategory(e);
        });
    });
}


// Delete Cattegory
