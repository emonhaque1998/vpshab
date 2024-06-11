import ProductClasses from "./ProductClasses";

const product = new ProductClasses();
// Basic Information Request

if (product.addProductFrom) {
    product.addProductFrom.addEventListener("submit", async (e) => {
        e.preventDefault();
        product.addProduct();
    });
}

// Delete Product
if (product.deleteBtn) {
    product.deleteBtn.forEach((edit) => {
        edit.addEventListener("click", (e) => {
            e.preventDefault();
            product.deleteProduct(e);
        });
    });
}

// Fresh ip change handler
if (product.freshIpBtn) {
    product.freshIpBtn.addEventListener("change", (e) => {
        e.preventDefault();
        product.freshIPBtnChangeHandler();
    });
}
