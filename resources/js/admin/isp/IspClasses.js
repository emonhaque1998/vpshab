import Extra from "../../Extra";

export default class IspClasses extends Extra {
    constructor() {
        super();
        this.ispSubmitForm = document.getElementById("ispSubmitForm");
        this.ispSubmitBtn = document.getElementById("ispSubmitBtn");
        this.ispListed = document.getElementById("ispListed");
    }

    async addIsp() {
        this.loading(this.ispSubmitBtn);
        const data = new FormData(this.ispSubmitForm);

        try {
            const response = await axios.post("isp", data);

            if (response.status == 200) {
                this.loading(this.ispSubmitBtn);
                this.appendIspList(response.data.result, this.ispListed);
                this.toast(response.data.message, "success");
            }
        } catch (error) {
            this.loading(this.ispSubmitBtn);
            this.toast(error.response.data.message, "error");
        }
    }

    appendIspList(data, viewList) {
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
