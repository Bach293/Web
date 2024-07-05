// Function to generate a random string
function generateRandomString(length) {
    let result = '';
    const characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
    const charactersLength = characters.length;

    for (let i = 0; i < length; i++) {
        result += characters.charAt(Math.floor(Math.random() * charactersLength));
    }

    return result;
}

// Get the file input element
const fileInput = document.getElementById('imageUpload');

// Add event listener for when a file is selected
fileInput.addEventListener('change', function (event) {
    const file = event.target.files[0];

    if (file) {
        // Generate a random file name
        const fileName = generateRandomString(10) + '_' + file.name;

        // Create a new file reader
        const reader = new FileReader();

        // Read the file as data URL
        reader.readAsDataURL(file);

        // Event listener for when the file has been loaded
        reader.onload = function () {
            // Get the data URL of the image
            const dataURL = reader.result;

            // Get the current image element
            const currentImage = document.getElementById('img-product_1');

            // Set the source of the image to the data URL
            currentImage.src = dataURL;

            // Upload the file to the server (you need to implement this part)
            // Replace 'YOUR_SERVER_URL' with the actual URL to upload the file
            // and 'YOUR_UPLOAD_ENDPOINT' with the endpoint to handle the file upload
            uploadFile(file, fileName, 'YOUR_SERVER_URL/YOUR_UPLOAD_ENDPOINT');
        };
    }
});

// Function to upload the file to the server
function uploadFile(file, fileName, uploadUrl) {
    // You need to implement this function to handle the file upload
    // to the server using AJAX or any other method you prefer
    // Here is an example using the Fetch API:

    const formData = new FormData();
    formData.append('file', file, fileName);

    fetch(uploadUrl, {
        method: 'POST',
        body: formData
    })
        .then(response => {
            // Handle the response from the server
            if (response.ok) {
                // File uploaded successfully
                console.log('File uploaded successfully');
            } else {
                // Error uploading file
                console.error('Error uploading file');
            }
        })
        .catch(error => {
            // Handle any errors during the upload process
            console.error('Upload error:', error);
        });
}