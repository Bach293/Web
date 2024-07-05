function togglePassword(icon) {
    var targetId = icon.getAttribute("data-target");
    var passwordInput = document.getElementById(targetId);

    if (passwordInput.type === "password") {
        passwordInput.type = "text";
        icon.classList.remove("bi-eye");
        icon.classList.add("bi-eye-slash");
    } else {
        passwordInput.type = "password";
        icon.classList.remove("bi-eye-slash");
        icon.classList.add("bi-eye");
    }
}
function addInfoColor() {
    // Tạo phần tử HTML mới
    const newRow = document.createElement('div');
    newRow.className = 'row p-3 align-items-center';

    const col1 = document.createElement('div');
    col1.className = 'col-lg-2 col-sm-0 col-0';
    newRow.appendChild(col1);

    const col2 = document.createElement('div');
    col2.className = 'col-lg-2 col-sm-5 col-5 text-end py-3';
    col2.innerHTML = 'Tên màu<span class="font-color_red">(*)</span>';
    newRow.appendChild(col2);

    const col3 = document.createElement('div');
    col3.className = 'col-lg-2 col-sm-6 col-6 py-3';
    const input1 = document.createElement('input');
    input1.type = 'text';
    input1.className = 'form-control';
    input1.placeholder = 'Tên màu';
    input1.required = true;
    col3.appendChild(input1);
    newRow.appendChild(col3);

    const col4 = document.createElement('div');
    col4.className = 'col-lg-2 col-sm-5 col-5 text-end py-3';
    col4.innerHTML = 'Đơn giá';
    newRow.appendChild(col4);

    const col5 = document.createElement('div');
    col5.className = 'col-lg-2 col-sm-6 col-6 py-3';
    const input2 = document.createElement('input');
    input2.type = 'text';
    input2.className = 'form-control';
    input2.placeholder = 'Tên màu';
    col5.appendChild(input2);
    newRow.appendChild(col5);

    const col6 = document.createElement('div');
    col6.className = 'col-1';
    const icon = document.createElement('i');
    icon.className = 'bi bi-trash3 fs-5';
    icon.style = 'cursor: pointer;';
    icon.addEventListener('click', function() {
        deleteInfoColor(this);
    });
    col6.appendChild(icon);
    newRow.appendChild(col6);

    // Lấy phần tử cha để thêm phần tử mới vào
    const parentElement = document.getElementById('parentInfoColor');
    parentElement.appendChild(newRow);
}

function deleteInfoColor(icon) {
    // Lấy phần tử cha (row) của biểu tượng xóa
    const row = icon.parentNode.parentNode;

    // Lấy phần tử cha của row và gọi phương thức removeChild để xóa row
    const parentElement = row.parentNode;
    parentElement.removeChild(row);
}