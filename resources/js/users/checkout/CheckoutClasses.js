export default class CheckoutClasses {
    constructor() {
        this.countryList = document.querySelector("#countryList");
        this.stateList = document.querySelector("#stateList");
        this.loadingEffect = document.querySelector("#cover-spin");
        this.freshIpAmountDiv = document.getElementById("freshIpAmountDiv");
        this.freshIpCheck = document.getElementById("freshIpCheck");
        this.checkoutRequest = document.getElementById("checkoutRequest");
        this.termsCondition = document.getElementById("termsCondition");
        this.quantityNumber = document.getElementById("quantityNumber");
        this.ispSelection = document.getElementById("ispSelection");
        this.productStock = document.getElementById("productStock");
    }

    termsConditionChangeHandler() {
        if (
            !this.termsCondition.checked ||
            Number(this.quantityNumber.value) <= 0 ||
            this.ispSelection.value === "0" ||
            this.quantityNumber.value > this.productStock.value
        ) {
            this.checkoutRequest.setAttribute("disabled", "");
        } else {
            this.checkoutRequest.removeAttribute("disabled");
        }
    }

    freshIPChangeHandler() {
        if (this.freshIpCheck.checked) {
            this.freshIpAmountDiv.style.display = "";
        } else {
            this.freshIpAmountDiv.style.display = "none";
        }
    }

    async selectCountryChangeState(event) {
        this.loadingEffect.style.display = "block";
        this.stateList.innerHTML = `
            <option value="">Select State</option>
        `;
        try {
            const response = await axios.get(
                `/check-country-state/${event.target.value}`
            );

            if (response.data.result) {
                response.data.result.forEach((element) => {
                    var child = document.createElement("option");
                    child.textContent = element.name;
                    this.stateList.appendChild(child);
                    this.loadingEffect.style.display = "none";
                });
            }
            this.loadingEffect.style.display = "none";
        } catch (error) {
            console.log(error);
        }
    }
}
