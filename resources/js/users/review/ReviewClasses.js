export default class ReviewClasses {
    constructor() {
        this.quantityNumber = document.getElementById("quantityNumber");
        this.priceAmount = document.querySelectorAll("#priceAmount");
        this.getAmmount = document.getElementById("getAmmount");
        this.checkoutRequest = document.getElementById("checkoutRequest");
        this.productSlug = document.getElementById("productSlug");
        this.termsCondition = document.getElementById("termsCondition");
        this.ispSelection = document.getElementById("ispSelection");
        this.freshIpAmount = document.getElementById("freshIpAmount");
        this.inputFreshIP_amount = document.getElementById(
            "inputFreshIP_amount"
        );
        this.totalPriceAmount = document.getElementById("totalPriceAmount");
        this.reviewSubmit = document.getElementById("reviewSubmit");
        this.freshIpCheck = document.getElementById("freshIpCheck");
        this.primaryInputFreshIP_amount = document.getElementById(
            "primaryInputFreshIP_amount"
        );
        this.freshIpAmountDiv = document.getElementById("freshIpAmountDiv");
        this.productStock = document.getElementById("productStock");
    }

    beforSubmitChackout() {
        if (!this.freshIpCheck.checked) {
            this.inputFreshIP_amount.value = 0;
            this.reviewSubmit.submit();
        } else {
            this.inputFreshIP_amount.value =
                this.primaryInputFreshIP_amount.value;
            this.reviewSubmit.submit();
        }
    }

    checkStock(){
        if(this.quantityNumber.value > this.productStock.value){
            this.checkoutRequest.setAttribute("disabled", "");
        }
    }

    ispSelectionCchangeHandeler() {
        if (
            this.ispSelection.value === "0" ||
            Number(this.quantityNumber.value) <= 0 ||
            !this.termsCondition.checked
        ) {
            this.checkoutRequest.setAttribute("disabled", "");
        } else {
            this.checkoutRequest.removeAttribute("disabled", "");
        }
    }

    amountCalculation() {
        this.priceAmount.forEach((item) => {
            item.innerText =
                Number(this.getAmmount.value) *
                Number(this.quantityNumber.value);
        });
        if (this.freshIpCheck.checked) {
            this.freshIpAmount.innerText =
                Number(this.primaryInputFreshIP_amount.value) *
                Number(this.quantityNumber.value);

            this.totalPriceAmount.innerText =
                Number(this.primaryInputFreshIP_amount.value) *
                    Number(this.quantityNumber.value) +
                Number(this.getAmmount.value) *
                    Number(this.quantityNumber.value);
        } else {
            this.totalPriceAmount.innerText =
                Number(this.getAmmount.value) *
                Number(this.quantityNumber.value);
        }

        this.checkoutRequest.href =
            "/checkout/" +
            Number(this.getAmmount.value) * Number(this.quantityNumber.value) +
            "/" +
            this.productSlug.value;

        if (
            Number(this.quantityNumber.value) <= 0 ||
            !this.termsCondition.checked ||
            this.ispSelection.value === "0"
        ) {
            this.checkoutRequest.setAttribute("disabled", "");
            return;
        } else {
            this.checkoutRequest.removeAttribute("disabled");
        }
    }
}
