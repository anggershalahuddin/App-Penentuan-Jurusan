// --------------------------------------------------------------------------------------------  //
// // ------------------------------------------ Upload FIle Modal ----------------------------------  //
// --------------------------------------------------------------------------------------------  //

function openUploadModal() {
    const modal = document.getElementById("UploadModal");
    modal.classList.remove("hidden"); // Hilangkan hidden agar modal tampil
    setTimeout(() => {
        modal.classList.remove("opacity-0"); // Atur opacity menjadi penuh
        modal.querySelector("div").classList.remove("scale-95"); // Atur scale menjadi normal
    }, 10); // Sedikit delay untuk memastikan transisi diterapkan
}

document.addEventListener("DOMContentLoaded", function () {
    const fileInput = document.getElementById("file");
    const uploadText = document.getElementById("uploadText");
    const uploadIcon = document.getElementById("uploadIcon");
    const closeModalButton = document.getElementById("closeModalButton");

    if (fileInput) {
        fileInput.addEventListener("change", function () {
            if (fileInput.files.length > 0) {
                const fileName = fileInput.files[0].name;
                uploadText.textContent = fileName; // Ganti teks dengan nama file
                uploadIcon.classList.remove(
                    "text-gray-500",
                    "dark:text-gray-400"
                );
                uploadIcon.classList.add("text-green-500");
            } else {
                uploadText.textContent = "Click to upload or drag and drop";
                uploadIcon.classList.remove("text-green-500");
                uploadIcon.classList.add("text-gray-500", "dark:text-gray-400");
            }
        });
    }

    if (closeModalButton) {
        closeModalButton.addEventListener("click", closeUploadModal);
    } else {
        console.error("Element with ID 'closeModalButton' not found.");
    }
});

document.addEventListener("DOMContentLoaded", function () {
    const fileInput = document.getElementById("file");
    const uploadText = document.getElementById("uploadText");
    const uploadIcon = document.getElementById("uploadIcon");
    const closeModalButton = document.getElementById("closeModalButton");

    if (fileInput) {
        fileInput.addEventListener("change", function () {
            if (fileInput.files.length > 0) {
                const fileName = fileInput.files[0].name;
                uploadText.textContent = fileName; // Ganti teks dengan nama file

                // Ganti ikon dengan SVG baru
                uploadIcon.innerHTML = `
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6">
                        <path fill-rule="evenodd" d="M5.625 1.5c-1.036 0-1.875.84-1.875 1.875v17.25c0 1.035.84 1.875 1.875 1.875h12.75c1.035 0 1.875-.84 1.875-1.875V12.75A3.75 3.75 0 0 0 16.5 9h-1.875a1.875 1.875 0 0 1-1.875-1.875V5.25A3.75 3.75 0 0 0 9 1.5H5.625ZM7.5 15a.75.75 0 0 1 .75-.75h7.5a.75.75 0 0 1 0 1.5h-7.5A.75.75 0 0 1 7.5 15Zm.75 2.25a.75.75 0 0 0 0 1.5H12a.75.75 0 0 0 0-1.5H8.25Z" clip-rule="evenodd" />
                        <path d="M12.971 1.816A5.23 5.23 0 0 1 14.25 5.25v1.875c0 .207.168.375.375.375H16.5a5.23 5.23 0 0 1 3.434 1.279 9.768 9.768 0 0 0-6.963-6.963Z" />
                    </svg>
                `;
                uploadIcon.classList.remove(
                    "text-gray-500",
                    "dark:text-gray-400"
                );
                uploadIcon.classList.add("text-green-500");
            } else {
                uploadText.textContent = "Click to upload or drag and drop";
                uploadIcon.innerHTML = `
                    <svg id="uploadIcon" class="w-9 h-9 mb-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2" />
                    </svg>
                `;
                uploadIcon.classList.remove("text-green-500");
                uploadIcon.classList.add("text-gray-500", "dark:text-gray-400");
            }
        });
    }

    if (closeModalButton) {
        closeModalButton.addEventListener("click", closeUploadModal);
    } else {
        console.error("Element with ID 'closeModalButton' not found.");
    }
});

function closeUploadModal() {
    const modal = document.getElementById("UploadModal");
    const fileInput = document.getElementById("file");
    const uploadIcon = document.getElementById("uploadIcon");
    const uploadText = document.getElementById("uploadText");

    if (modal && fileInput && uploadIcon && uploadText) {
        fileInput.value = ""; // Mengosongkan input file
        uploadText.textContent = "Click to upload or drag and drop"; // Kembalikan teks ke kondisi awal

        // Kembalikan ikon ke kondisi awal
        uploadIcon.innerHTML = `
            <svg id="uploadIcon" class="w-8 h-8 mb-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2" />
            </svg>
        `;
        uploadIcon.classList.remove("text-green-500");
        uploadIcon.classList.add("text-gray-500", "dark:text-gray-400");

        modal.classList.add("opacity-0"); // Kembalikan opacity menjadi nol
        modal.querySelector("div").classList.add("scale-95"); // Kembalikan scale menjadi kecil

        setTimeout(() => {
            modal.classList.add("hidden"); // Sembunyikan modal setelah transisi selesai
        }, 300); // Pastikan waktu ini sama dengan durasi transisi CSS
    } else {
        console.error("One or more elements not found.");
    }
}

// --------------------------------------------------------------------------------------------  //
// // ------------------------------------------ Alert Modal ----------------------------------  //
// --------------------------------------------------------------------------------------------  //

function showAlertSuccessModal() {
    const modal = document.getElementById("alert-success");

    // Menghapus kelas hidden dan menambahkan kelas opacity-100 untuk transisi muncul
    modal.classList.remove("hidden");
    modal.classList.remove("opacity-0");
    modal.classList.add("opacity-100");
}

function closeAlertSuccessModal() {
    const alertModal = document.getElementById("alert-success");
    alertModal.classList.remove("opacity-100");
    alertModal.classList.add("opacity-0");

    setTimeout(() => {
        alertModal.style.display = "none";
    }, 300); // Durasi sesuai dengan transition-opacity (300ms)
}

function showAlertErrorModal() {
    const modal = document.getElementById("alert-error");

    // Menghapus kelas hidden dan menambahkan kelas opacity-100 untuk transisi muncul
    modal.classList.remove("hidden");
    modal.classList.remove("opacity-0");
    modal.classList.add("opacity-100");
}

function closeAlertErrorModal() {
    const alertModal = document.getElementById("alert-error");
    alertModal.classList.remove("opacity-100");
    alertModal.classList.add("opacity-0");

    setTimeout(() => {
        alertModal.style.display = "none";
    }, 300); // Durasi sesuai dengan transition-opacity (300ms)
}

// // -------------------------------------------------------------------------- Dashboard/Periods
// // ------------------------------------------------------------- Delete Modal
// function openDeleteModalPeriod(periodId) {
//     const deleteForm = document.getElementById("deleteForm");
//     deleteForm.action = `/dashboard/periods/${periodId}`;

//     const modal = document.getElementById("DeleteModalPeriod");
//     modal.classList.remove("hidden");
//     modal.classList.add("flex");

//     // Menggunakan sedikit jeda untuk memastikan transisi berjalan
//     setTimeout(() => {
//         modal.classList.remove("opacity-0", "scale-95");
//     }, 10);
// }

// function closeDeleteModalPeriod() {
//     const modal = document.getElementById("DeleteModalPeriod");

//     // Menambahkan kelas untuk memulai transisi keluar
//     modal.classList.remove("opacity-100");
//     modal.classList.add("opacity-0");

//     // Setelah durasi transisi, modal disembunyikan kembali
//     setTimeout(() => {
//         modal.classList.add("hidden");
//     }, 300); // Durasi transisi disesuaikan dengan Tailwind (300ms)
// }

// // -------------------------------------------------------------------------- Dashboard/Students
// // ------------------------------------------------------------- Delete Modal

function openDeleteModalStudent(studentId) {
    const deleteForm = document.getElementById("deleteForm");
    deleteForm.action = `/dashboard/students/${studentId}`;

    const modal = document.getElementById("DeleteModalStudent");
    modal.classList.remove("hidden");
    modal.classList.add("flex");

    // Menggunakan sedikit jeda untuk memastikan transisi berjalan
    setTimeout(() => {
        modal.classList.remove("opacity-0", "scale-95");
    }, 10);
}

function closeDeleteModalStudent() {
    const modal = document.getElementById("DeleteModalStudent");

    // Menambahkan kelas untuk memulai transisi keluar
    modal.classList.remove("opacity-100");
    modal.classList.add("opacity-0");

    // Setelah durasi transisi, modal disembunyikan kembali
    setTimeout(() => {
        modal.classList.add("hidden");
    }, 300); // Durasi transisi disesuaikan dengan Tailwind (300ms)
}

// / -------------------------------------------------------------------------- Dashboard/Centroid
// // ------------------------------------------------------------- Delete Modal

function openDeleteModalCentroid(centroid_id) {
    const deleteForm = document.getElementById("deleteForm");
    deleteForm.action = `/dashboard/centroids/${centroid_id}`;

    const modal = document.getElementById("DeleteModalCentroid");
    modal.classList.remove("hidden");
    modal.classList.add("flex");

    // Menggunakan sedikit jeda untuk memastikan transisi berjalan
    setTimeout(() => {
        modal.classList.remove("opacity-0", "scale-95");
    }, 10);
}

function closeDeleteModalCentroid() {
    const modal = document.getElementById("DeleteModalCentroid");

    // Menambahkan kelas untuk memulai transisi keluar
    modal.classList.remove("opacity-100");
    modal.classList.add("opacity-0");

    // Setelah durasi transisi, modal disembunyikan kembali
    setTimeout(() => {
        modal.classList.add("hidden");
    }, 300); // Durasi transisi disesuaikan dengan Tailwind (300ms)
}

// --------------------------------------------------------------------------------------------  //
// // ----------------------------------- Edit Account Modal ----------------------------------  //
// --------------------------------------------------------------------------------------------  //

function openEditAccountModal() {
    const modal = document.getElementById("editAccountModal");
    modal.classList.remove("hidden");
    setTimeout(() => {
        modal.classList.remove("opacity-0");
        modal.querySelector("div").classList.remove("scale-95");
    }, 10); // Delay to allow the transition effect
}

function closeEditAccountModal() {
    const modal = document.getElementById("editAccountModal");
    modal.classList.add("opacity-0");
    modal.querySelector("div").classList.add("scale-95");
    setTimeout(() => {
        modal.classList.add("hidden");
    }, 300); // Duration must match the transition duration in CSS
}
