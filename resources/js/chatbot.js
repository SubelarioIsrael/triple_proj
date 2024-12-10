document.addEventListener("DOMContentLoaded", function () {
    const chatForm = document.querySelector("form");
    const chatMessages = document.getElementById("chat-messages");
    const typingIndicator = document.createElement("div");
    typingIndicator.id = "typing-indicator";
    typingIndicator.className = "flex items-start mt-4";
    typingIndicator.innerHTML = `
        <div class="bg-gray-200 text-gray-800 px-4 py-2 rounded-lg shadow-md max-w-xs animate-pulse">
            ...
        </div>
    `;

    chatForm.addEventListener("submit", function (e) {
        e.preventDefault(); // Prevent form submission

        // Get message input and add to chat
        const input = e.target.elements["message"];
        const userMessage = input.value.trim();
        if (!userMessage) return;

        // Display user message immediately
        const userMessageDiv = document.createElement("div");
        userMessageDiv.className = "flex items-end justify-end mt-4";
        userMessageDiv.innerHTML = `
            <div class="bg-blue-500 text-white px-4 py-2 rounded-lg shadow-md max-w-xs">
                ${userMessage}
            </div>
        `;
        chatMessages.appendChild(userMessageDiv);

        // Clear input field
        input.value = "";

        // Show typing indicator
        chatMessages.appendChild(typingIndicator);

        // Simulate chatbot response after 2-3 seconds
        setTimeout(() => {
            chatMessages.removeChild(typingIndicator); // Remove typing indicator

            const botMessageDiv = document.createElement("div");
            botMessageDiv.className = "flex items-start mt-4";
            botMessageDiv.innerHTML = `
                <div class="bg-gray-200 text-gray-800 px-4 py-2 rounded-lg shadow-md max-w-xs">
                    I received your message: "${userMessage}"
                </div>
            `;
            chatMessages.appendChild(botMessageDiv);

            // Scroll to the latest message
            chatMessages.scrollTop = chatMessages.scrollHeight;
        }, 2000); // Adjust delay as needed (e.g., 2000ms = 2 seconds)
    });
});
