export default class ReadClasses {
    constructor() {
        this.supportBtn = document.querySelectorAll("#supportBtn");
        this.supportContent = document.querySelectorAll("#supportContent");
        this.data = [" Sup24x7 fully managed support from our experts, this level of support is crucial for businesses or services that operate globally or have users in different time zones, as it helps maintain uptime, customer satisfaction, and business continuity.port", 
            " We provide top-notch performance with powerful servers, ensuring smooth and efficient remote desktop experiences for our customers with Our dedicated Residential IP solution.", 
            " A powerful virtualization solution offers robust capabilities for creating and managing virtualized environments, scalability to accommodate evolving business needs, and resource efficiency to optimize resource utilization and reduce costs. These characteristics are essential for building agile, resilient, and cost-effective IT infrastructures that can support the diverse requirements of modern organizations."];
    }

    readMoreSupport(index) {
        this.setInformation(index);
    }

    setInformation(index) {
        this.supportContent[index].innerText =
            this.supportContent[index].innerText + this.data[index];
        this.supportBtn[index].style.display = "none";

        setTimeout((e) => {
            this.supportContent[index].innerText = this.supportContent[
                index
            ].innerText.replace(new RegExp(this.data[index], "g"), "");
            this.supportBtn[index].style.display = "inline-block";
        }, 10000);
    }
}
