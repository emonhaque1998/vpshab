import MapClasses from "./MapClasses";

const mapInfo = new MapClasses();

// Add Map Information Request
if (mapInfo.websiteMapForm) {
    mapInfo.websiteMapForm.addEventListener("submit", async (e) => {
        e.preventDefault();
        mapInfo.addMapInfo();
    });
}
