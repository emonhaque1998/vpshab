import Extra from "../../Extra";

export default class ContactClasses extends Extra {
    constructor() {
        super();
        this.checkbox = document.getElementById("checkbox");
        this.contactSubmitForm = document.getElementById("contactSubmitForm");
        this.contactSubmitBtn = document.getElementById("contactSubmitBtn");
        this.contactMsg = document.getElementById("contactMsg");
    }

    async submitContact() {
        this.loading(this.contactSubmitBtn);
        if (!this.checkbox.checked) {
            this.contactMsg.children[0].innerText =
                "Please read our policy and Select Checkbox";
            this.contactMsg.style.display = "block";
            this.loading(this.contactSubmitBtn);
            return;
        }

        const data = new FormData(this.contactSubmitForm);
        try {
            const response = await axios.post("contact", data);

            if (response.status == 200) {
                this.contactMsg.children[0].innerText = response.data.message;
                this.contactMsg.style.display = "block";
                this.loading(this.contactSubmitBtn);
            }
        } catch (error) {
            this.contactMsg.children[0].innerText = error.response.data.message;
            this.contactMsg.style.display = "block";
            this.loading(this.contactSubmitBtn);
        }
    }
}
