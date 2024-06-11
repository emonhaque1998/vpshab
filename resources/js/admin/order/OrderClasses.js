import Extra from "./../../Extra";

export default class OrderClasses extends Extra {
    constructor() {
        super();
        this.statusUpdateSubmitForm = document.getElementById(
            "statusUpdateSubmitForm"
        );
        this.statusUpdateSubmitBtn = document.getElementById(
            "statusUpdateSubmitBtn"
        );
        this.orderId = document.getElementById("orderId");
    }

    async updateStatus() {
        this.loading(this.statusUpdateSubmitBtn);
        const data = new FormData(this.statusUpdateSubmitForm);

        try {
            const response = await axios.patch(
                `/admin/orders/all-orders/${this.orderId.value}`,
                data
            );

            if (response.status == 200) {
                this.loading(this.statusUpdateSubmitBtn);
                this.toast(response.data.message, "success");
            }
        } catch (error) {
            this.loading(this.statusUpdateSubmitBtn);
            this.toast(error.response.data.message, "error");
        }
    }
}
