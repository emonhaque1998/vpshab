export default class AppentCategory {
    constructor() {
        this.categoryList = document.querySelector("#categoryList");
    }

    appendCategoryHtml(category) {
        const serial = this.categoryList.children.length + 1;
        return (categoryList.innerHTML += `
        <tr>
        <td>#${serial}</td>
        <td>${category.category_name}</td>
        <td>${category.category_slug}</td>
        <td>54</td>
        <td>
            <div class="d-flex align-items-center gap-3 fs-6">
                <a href="javascript:;" class="text-primary" data-bs-toggle="tooltip"
                    data-bs-placement="bottom" title=""
                    data-bs-original-title="View detail" aria-label="Views"><i
                        class="bi bi-eye-fill"></i></a>
                <a href="javascript:;" class="text-warning" data-bs-toggle="tooltip"
                    data-bs-placement="bottom" title=""
                    data-bs-original-title="Edit info" aria-label="Edit"><i
                        class="bi bi-pencil-fill"></i></a>
                <a href="javascript:;" class="text-danger" data-bs-toggle="tooltip"
                    data-bs-placement="bottom" title=""
                    data-bs-original-title="Delete" aria-label="Delete"><i
                        class="bi bi-trash-fill"></i></a>
            </div>
        </td>
    </tr>
        `);
    }
}
