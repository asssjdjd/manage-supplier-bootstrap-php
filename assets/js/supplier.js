// Dữ liệu mô phỏng nhà cung cấp
const suppliers = [
  {
    name: "Mark",
    service: "Vệ sinh",
    contract: "3",
    status: "Active",
    email: "mark@example.com",
  },
  {
    name: "Jacob",
    service: "Điện",
    contract: "1",
    status: "Inactive",
    email: "jacob@example.com",
  },
  {
    name: "Larry",
    service: "Bảo trì",
    contract: "5",
    status: "Active",
    email: "larry@example.com",
  },
  {
    name: "David",
    service: "Vệ sinh",
    contract: "2",
    status: "Active",
    email: "david@example.com",
  },
  {
    name: "Sarah",
    service: "Điện",
    contract: "4",
    status: "Inactive",
    email: "sarah@example.com",
  },
  {
    name: "John",
    service: "Bảo trì",
    contract: "1",
    status: "Active",
    email: "john@example.com",
  },
  {
    name: "Alice",
    service: "Vệ sinh",
    contract: "3",
    status: "Inactive",
    email: "alice@example.com",
  },
  {
    name: "Bob",
    service: "Điện",
    contract: "2",
    status: "Active",
    email: "bob@example.com",
  },
  {
    name: "Emily",
    service: "Bảo trì",
    contract: "6",
    status: "Inactive",
    email: "emily@example.com",
  },
  {
    name: "Michael",
    service: "Vệ sinh",
    contract: "3",
    status: "Active",
    email: "michael@example.com",
  },
  {
    name: "Lisa",
    service: "Điện",
    contract: "2",
    status: "Inactive",
    email: "lisa@example.com",
  },
  {
    name: "James",
    service: "Bảo trì",
    contract: "4",
    status: "Active",
    email: "james@example.com",
  },
  {
    name: "Robert",
    service: "Vệ sinh",
    contract: "5",
    status: "Inactive",
    email: "robert@example.com",
  },
  {
    name: "David",
    service: "Điện",
    contract: "1",
    status: "Active",
    email: "david@example.com",
  },
  {
    name: "Nancy",
    service: "Bảo trì",
    contract: "2",
    status: "Inactive",
    email: "nancy@example.com",
  },
  {
    name: "George",
    service: "Vệ sinh",
    contract: "3",
    status: "Active",
    email: "george@example.com",
  },
  {
    name: "William",
    service: "Điện",
    contract: "4",
    status: "Inactive",
    email: "william@example.com",
  },
  {
    name: "Olivia",
    service: "Bảo trì",
    contract: "5",
    status: "Active",
    email: "olivia@example.com",
  },
  {
    name: "Sophia",
    service: "Vệ sinh",
    contract: "2",
    status: "Inactive",
    email: "sophia@example.com",
  },
];


const itemsPerPage = 5;
let currentPage = 1;
const totalPages = 4;

function renderTable(page) {
  const startIndex = (page - 1) * itemsPerPage;
  const endIndex = startIndex + itemsPerPage;
  const currentSuppliers = suppliers.slice(startIndex, endIndex);

  const tableBody = document.getElementById("supplier-list");
  tableBody.innerHTML = "";

  currentSuppliers.forEach((supplier) => {
    const row = document.createElement("tr");
    row.innerHTML = `
        <th scope="row">${supplier.name}</th>
        <td>${supplier.service}</td>
        <td>${supplier.contract}</td>
        <td>${supplier.status}</td>
        <td>${supplier.email}</td>
        <td>
          <button class="btn btn-info btn-sm">Detail</button>
          <button class="btn btn-warning btn-sm">Update</button>
          <button class="btn btn-danger btn-sm">Delete</button>
        </td>
      `;
    tableBody.appendChild(row);
  });
}

renderTable(1);

const button_paginate = document.querySelectorAll("#paginate-supplier .pagination .page-item");

function updatePagination(page) {
    if(page != 0) {
        // console.log(page)
            // Remove the active class from all buttons
        button_paginate.forEach(item => item.classList.remove("active"));
        
        // Add active class to the clicked page
        const x = button_paginate[page].classList.add("active");

        renderTable(page)
    }else {
        button_paginate[0].classList.add("active")
    }
}


function goToPage(page) {
    // Update current page number
    if (page >= 0 && page <= totalPages) {
        currentPage = page;
        updatePagination(currentPage);
    }
}

button_paginate.forEach((button) => {
    button.addEventListener("click", () => {
        // When a page button is clicked, go to that page
        const value = button.querySelector("a").innerHTML;
        updatePagination(value)
    });
});

document.querySelector('.pagination .page-item:first-child').addEventListener("click", () => {
    if (currentPage >= 1) {
        goToPage(currentPage - 1);
    }
});

document.querySelector('.pagination .page-item:last-child').addEventListener("click", () => {
    if (currentPage <= totalPages-1 ) {
        goToPage(currentPage + 1);
    }
});



// xu ly voi modal
var myModal = document.getElementById('myModal')
var myInput = document.getElementById('myInput')

myModal.addEventListener('shown.bs.modal', function () {
  myInput.focus()
})