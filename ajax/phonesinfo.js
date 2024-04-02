document.addEventListener('DOMContentLoaded', function () {
    const productList = document.querySelector('.container .row');

    let data;

    function loadPhones() {
        fetch("../data/phonesinfo.json")
            .then(response => response.json())
            .then(fetchedData => {
                data = fetchedData;
                let phoneItems = ''; // Variable to store HTML content
                const phones = data.phone;
                if (Array.isArray(phones)) {
                    phones.forEach(phone => {
                      phoneItems += `
                        <div class="col mb-5">
                        <div class="card h-100">
                            <!-- Product image-->
                            <img class="card-img-top" src="${phone.image}" alt="${phone.title}" />
                            <!-- Product details-->
                            <div class="card-body p-4">
                                <div class="text-center">
                                    <!-- Product name-->
                                    <h5 class="fw-bolder">${phone.name}</h5>
                                    <!-- Product price-->
                                    ${phone.price}
                                </div>
                            </div>
                            <!-- Product actions-->
                            <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="#">Add to cart</a></div>
                            </div>
                        </div>
                    </div>
                    `;
                });
                productList.innerHTML += phoneItems; // Append the HTML content
            }})
            .catch(error => {
                console.error('There was a problem with the fetch operation:', error);
            });
    }

    loadPhones();
});
