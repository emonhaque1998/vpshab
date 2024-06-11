import Extra from "./../../Extra";

export default class CupponClasses extends Extra {
    constructor() {
        super();
        this.cupponSubmitForm = document.getElementById("cupponSubmitForm");
        this.cupponSubmitBtn = document.getElementById("cupponSubmitBtn");
    }

    async addCuppon() {
        this.loading(this.cupponSubmitBtn);
        const data = new FormData(this.cupponSubmitForm);

        try {
            const response = await axios.post("cuppon", data);

            if (response.status == 200) {
                this.loading(this.cupponSubmitBtn);
                this.appendCupponList(response.data.result, this.ispListed);
                this.toast(response.data.message, "success");
            }
        } catch (error) {
            this.loading(this.cupponSubmitBtn);
            this.toast(error.response.data.message, "error");
        }
    }

    appendCupponList(data, viewList) {
        const serial = viewList.children.length + 1;
        viewList.innerHTML += `
            <tr>
                <td>#${serial}</td>
                <td>${data.name}</td>
                <td>
                    <div class="d-flex align-items-center gap-3 fs-6">
                        <a href="javascript:;" class="text-danger" data="${data.id}" onclick="deleteISP(event)"
                            data-bs-toggle="tooltip" data-bs-placement="bottom"
                            title="" data-bs-original-title="Delete"
                            aria-label="Delete"><i class="bi bi-trash-fill"></i></a>
                    </div>
                </td>
            </tr>
        `;
    }
}
