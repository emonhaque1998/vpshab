import ReviewClasses from "./ReviewClasses";

const review = new ReviewClasses();

if (review.quantityNumber) {
    review.quantityNumber.addEventListener("change", (e) => {
        review.amountCalculation();
        review.checkStock();
    });
}

// Window load amoutn fixing
if (review.quantityNumber) {
    window.addEventListener("load", (e) => {
        review.amountCalculation();
        review.checkStock();
    });
}

// Isp change handler
if (review.ispSelection) {
    review.ispSelection.addEventListener("change", (e) => {
        e.preventDefault();
        review.ispSelectionCchangeHandeler();
    });
}

// before submit
if (review.freshIpAmountDiv) {
    if (review.reviewSubmit) {
        review.reviewSubmit.addEventListener("submit", (e) => {
            e.preventDefault();
            review.beforSubmitChackout();
        });
    }
}

if (review.freshIpCheck) {
    review.freshIpCheck.addEventListener("change", (e) => {
        e.preventDefault();
        review.amountCalculation();
    });
}
