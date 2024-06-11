import SpecificationClasses from "./SpecificationClasses";

const specification = new SpecificationClasses();

// Add new Specification
if (specification.specificationForm) {
    specification.specificationForm.addEventListener("submit", (e) => {
        e.preventDefault();
        specification.addSpecification();
    });
}

// Remove Specification
if (specification.removeSpecificationBtn) {
    specification.removeSpecificationBtn.forEach((item) => {});
}
