function renderPeopleRow({ name, age }) {
    return `
        <tr>
            <td>${name}</td>
            <td>${age}</td>
        </tr>
    `;
}

function renderPeopleTable(people) {
    const tableBody = document.querySelector("tbody");
    tableBody.innerHTML = people.map(renderPeopleRow).join("\n");
}

async function registerPeople(people) {
    const body = new FormData();

    people.forEach(({ name, age }) => {
        body.append(`name[]`, name);
        body.append(`age[]`, age);
    });

    return fetch("http://localhost:8080/register", {
        method: "POST",
        body,
    })
        .then((response) => response.text())
        .then(console.log);
}

function initRegisterPeopleForm() {
    const peopleData = [];

    const addPersonForm = document.querySelector("form");
    const nameInput = document.querySelector("#name");
    const ageInput = document.querySelector("#age");

    const registerPeopleButton = document.querySelector("#register-people");

    function clearAddPersonForm() {
        nameInput.value = "";
        ageInput.value = "";
    }

    function addPerson() {
        const name = nameInput.value;
        const age = ageInput.value;
        peopleData.push({ name, age });
    }

    addPersonForm.addEventListener("submit", (event) => {
        event.preventDefault();
        addPerson();
        renderPeopleTable(peopleData);
        clearAddPersonForm();
    });

    registerPeopleButton.addEventListener("click", async () => {
        await registerPeople(peopleData);
        alert("People registered");
    });
}

initRegisterPeopleForm();
