
document.querySelector("form").addEventListener("submit", function(e) {
    
    const name = document.querySelector("[name='name']").value;
    const email = document.querySelector("[name='email']").value;
    const message = document.querySelector("[name='message']").value;

    if (name === "" || email === "" || message === "") {
        e.preventDefault();
        alert("All fields are required!");
        return;
    }

    if (!email.includes("@")) {
        e.preventDefault();
        alert("Enter a valid email!");
        return;
    }
});
