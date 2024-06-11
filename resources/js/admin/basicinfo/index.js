import BasicInfoClasses from "./BasicInfoClasses";

const basicInfo = new BasicInfoClasses();

// Basic Information Request
if (basicInfo.websiteInfoForm) {
    basicInfo.websiteInfoForm.addEventListener("submit", async (e) => {
        e.preventDefault();
        basicInfo.setBasicInfo();
    });
}

// Banner Information Request
if (basicInfo.bannerInfoForm) {
    basicInfo.bannerInfoForm.addEventListener("submit", async (e) => {
        e.preventDefault();
        basicInfo.setBannerInformation();
    });
}
