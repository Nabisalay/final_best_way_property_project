// Check for the presence of a session variable or authentication cookie
// Check for the presence of a session token or authentication status

//     let currentUrl = window.location.href;
//     if (currentUrl.indexOf('admin-panel.html') > -1){
//     if (!localStorage.getItem("sessionToken")) {
//       // Redirect the user back to the login page
//       window.location.href = "signup.html";
//     }
// }
function login(event) {
    event.preventDefault();
  
    const usernameInput = document.querySelector('#username');
    const passwordInput = document.querySelector('#password');
  
    // Make a POST request to the server with the login credentials
    fetch('serverscript.php', {
      method: 'POST',
      headers: {
        'Content-Type': 'application/x-www-form-urlencoded'
      },
      body: `username=${usernameInput.value}&password=${passwordInput.value}`
    })
    .then(response => response.json())
    .then(data => {
      if (data.success) {
        // Store the session tokSen in localStorage
        sessionStorage.setItem('sessionToken', data.sessionToken);
        confirm('login Successfully');
        passwordInput.style.border = "1px solid green";
        usernameInput.style.border = "1px solid green";
  
        // Redirect the user to the admin panel
        window.location.href = 'admin-panel.html';
      } else {
        // Display an error message
        confirm(data.error);
        passwordInput.style.border = "1px solid red";
        usernameInput.style.border = "1px solid red";
      }
    })
    .catch(error => {
      console.error('Error:', error);
    });
  }

// this is to show the password1
function showpassword(){
    document.getElementById('password').type = 'text'
};
// this is to hide the password1

function hidepassword(){
    document.getElementById('password').type = 'password'
};
// this is to show the password2

// this is for trending properties on the home page 

function clientreview() {
 fetch('../database.php')
    .then(response => response.json())
    .then(data => {

            // Get the left-side-container element
            const leftSideContainer = document.getElementById('left-side-container');

            // Clear the container before appending the table
            leftSideContainer.innerHTML = '';

            const dashbord = document.querySelector('.dashbord');

            dashbord.innerHTML = 'Client Reviews';

            const leftsidewrapper = document.querySelector('.left-side');

            leftsidewrapper.style.overflow = 'scroll';

      // Access the client data
      const client_reviews = data.client_reviews;

      // Create the table element
      const table = document.createElement('table');

      // Create the table header
      const tableHeader = document.createElement('tr');
      const headers = ['Id no', 'Client Name', 'Status', 'Complement', 'Rating', 'Review', 'Image'];

      headers.forEach(headerText => {
        const header = document.createElement('th');
        header.textContent = headerText;
        tableHeader.appendChild(header);
      });

      // Append the table header to the table
      table.appendChild(tableHeader);

      // Create the table body
      const tableBody = document.createElement('tbody');

      // Create a row for each data entry
      client_reviews.forEach(review => {
        // Create a row for each review
        const row = document.createElement('tr');

        // Create cells for each column
        const idCell = document.createElement('td');
        idCell.textContent = review.review_id;
        row.appendChild(idCell);

        const clientNameCell = document.createElement('td');
        clientNameCell.textContent = review.name;
        row.appendChild(clientNameCell);

        const statusCell = document.createElement('td');
        statusCell.textContent = review.status;
        row.appendChild(statusCell);

        const complementCell = document.createElement('td');
        complementCell.textContent = review.complement;
        row.appendChild(complementCell);

        const ratingCell = document.createElement('td');
        ratingCell.textContent = review.ratting;
        row.appendChild(ratingCell);

        const reviewCell = document.createElement('td');
        reviewCell.textContent = review.review;
        row.appendChild(reviewCell);

        const imageCell = document.createElement('td');
        imageCell.textContent = review.image ? 'Yes' : 'No';
        row.appendChild(imageCell);

        // Append the row to the table body
        tableBody.appendChild(row);
      });

      // Append the table body to the table
      table.appendChild(tableBody);



      // Append the table to the left-side-container
      leftSideContainer.appendChild(table);

    })
    .catch(error => console.error(error));
}


// this is for the contact us form info 
function contactform() {
  const main_data_base = fetch('serverscript.php')
    .then(response => response.json())
    .then(contact_form_data => {

            // Get the left-side-container element
            const leftSideContainer = document.getElementById('left-side-container');

            // Clear the container before appending the table
            leftSideContainer.innerHTML = '';

            const dashbord = document.querySelector('.dashbord');

            dashbord.innerHTML = 'Contact Form';

            const leftsidewrapper = document.querySelector('.left-side');

            leftsidewrapper.style.overflow = 'scroll';

      // Access the client data
      const contact_form = contact_form_data.contact_form_info;

      // Create the table element
      const table = document.createElement('table');

      // Create the table header
      const tableHeader = document.createElement('tr');
      const headers = ['Customer Id', 'First Name', 'Last Name', 'Email Address', 'Phone No', 'Message'];

      headers.forEach(headerText => {
        const header = document.createElement('th');
        header.textContent = headerText;
        tableHeader.appendChild(header);
      });

      // Append the table header to the table
      table.appendChild(tableHeader);

      // Create the table body
      const tableBody = document.createElement('tbody');

      // Create a row for each data entry
      contact_form.forEach(contact => {
        // Create a row for each review
        const row = document.createElement('tr');

        // Create cells for each column
        const idCell = document.createElement('td');
        idCell.textContent = contact.customer_id ;
        row.appendChild(idCell);

        const clientNameCell = document.createElement('td');
        clientNameCell.textContent = contact.first_name;
        row.appendChild(clientNameCell);

        const statusCell = document.createElement('td');
        statusCell.textContent = contact.last_name;
        row.appendChild(statusCell);

        const complementCell = document.createElement('td');
        complementCell.textContent = contact.email;
        row.appendChild(complementCell);

        const ratingCell = document.createElement('td');
        ratingCell.textContent = contact.Phone_no;
        row.appendChild(ratingCell);

        const reviewCell = document.createElement('td');
        reviewCell.textContent = contact.message;
        row.appendChild(reviewCell);

        // Append the row to the table body
        tableBody.appendChild(row);
      });

      // Append the table body to the table
      table.appendChild(tableBody);



      // Append the table to the left-side-container
      leftSideContainer.appendChild(table);

    })
    .catch(error => console.error(error));
}

// this is for the Schedule Form info 
function Scheduleform() {
  const main_data_base = fetch('serverscript.php')
    .then(response => response.json())
    .then(contact_form_data => {

            // Get the left-side-container element
            const leftSideContainer = document.getElementById('left-side-container');

            // Clear the container before appending the table
            leftSideContainer.innerHTML = '';

            const dashbord = document.querySelector('.dashbord');

            dashbord.innerHTML = 'Schedule Form';

            const leftsidewrapper = document.querySelector('.left-side');
            
            leftsidewrapper.style.overflow = 'scroll'

      // Access the client data
      const Schedule_form = contact_form_data.Schedule_form_info;

      // Create the table element
      const table = document.createElement('table');

      // Create the table header
      const tableHeader = document.createElement('tr');
      const headers = ['Customer Id', 'First Name', 'Last Name', 'Email Address', 'Phone No', 'Date', 'Day', 'year', 'time', 'Message'];

      headers.forEach(headerText => {
        const header = document.createElement('th');
        header.textContent = headerText;
        tableHeader.appendChild(header);
      });

      // Append the table header to the table
      table.appendChild(tableHeader);

      // Create the table body
      const tableBody = document.createElement('tbody');

      // Create a row for each data entry
      Schedule_form.forEach(Schedule => {
        // Create a row for each review
        const row = document.createElement('tr');

        // Create cells for each column
        const idCell = document.createElement('td');
        idCell.textContent = Schedule.tour_customer_id;
        row.appendChild(idCell);

        const clientNameCell = document.createElement('td');
        clientNameCell.textContent = Schedule.first_name;
        row.appendChild(clientNameCell);

        const statusCell = document.createElement('td');
        statusCell.textContent = Schedule.last_name;
        row.appendChild(statusCell);

        const complementCell = document.createElement('td');
        complementCell.textContent = Schedule.email;
        row.appendChild(complementCell);

        const ratingCell = document.createElement('td');
        ratingCell.textContent = Schedule.phone_no;
        row.appendChild(ratingCell);

        const dateCell = document.createElement('td');
        dateCell.textContent = Schedule.date;
        row.appendChild(dateCell);

        const dayCell = document.createElement('td');
        dayCell.textContent = Schedule.day;
        row.appendChild(dayCell);

        const yearCell = document.createElement('td');
        yearCell.textContent = Schedule.year;
        row.appendChild(yearCell);

        const timeCell = document.createElement('td');
        timeCell.textContent = Schedule.time;
        row.appendChild(timeCell);

        const reviewCell = document.createElement('td');
        reviewCell.textContent = Schedule.message;
        row.appendChild(reviewCell);

        // Append the row to the table body
        tableBody.appendChild(row);

       

      });

      // Append the table body to the table
      table.appendChild(tableBody);



      // Append the table to the left-side-container
      leftSideContainer.appendChild(table);

    })
    .catch(error => console.error(error));
}

// this is for the news letter Form info 
function newsletter() {
  const main_data_base = fetch('serverscript.php')
    .then(response => response.json())
    .then(contact_form_data => {

            // Get the left-side-container element
            const leftSideContainer = document.getElementById('left-side-container');

            // Clear the container before appending the table
            leftSideContainer.innerHTML = '';

            const dashbord = document.querySelector('.dashbord');

            dashbord.innerHTML = 'News Letter Subscription';

            const leftsidewrapper = document.querySelector('.left-side');
            
            leftsidewrapper.style.overflow = 'scroll'

      // Access the client data
      const newsletter_info = contact_form_data.newsletter_form_info;

      // Create the table element
      const table = document.createElement('table');

      // Create the table header
      const tableHeader = document.createElement('tr');
      const headers = ['Customer Id', 'Email Address'];

      headers.forEach(headerText => {
        const header = document.createElement('th');
        header.textContent = headerText;
        tableHeader.appendChild(header);
      });

      // Append the table header to the table
      table.appendChild(tableHeader);

      // Create the table body
      const tableBody = document.createElement('tbody');

      // Create a row for each data entry
      newsletter_info.forEach(newsletter => {
        // Create a row for each review
        const row = document.createElement('tr');

        // Create cells for each column
        const idCell = document.createElement('td');
        idCell.textContent = newsletter.subscription_id ;
        row.appendChild(idCell);


        const complementCell = document.createElement('td');
        complementCell.textContent = newsletter.email_address;
        row.appendChild(complementCell);


        // Append the row to the table body
        tableBody.appendChild(row);

       

      });

      // Append the table body to the table
      table.appendChild(tableBody);



      // Append the table to the left-side-container
      leftSideContainer.appendChild(table);

    })
    .catch(error => console.error(error));
}

// this is for the add listing Form info 
function addlistinginfo() {
  const main_data_base = fetch('serverscript.php')
    .then(response => response.json())
    .then(contact_form_data => {

            // Get the left-side-container element
            const leftSideContainer = document.getElementById('left-side-container');

            // Clear the container before appending the table
            leftSideContainer.innerHTML = '';

            const dashbord = document.querySelector('.dashbord');

            dashbord.innerHTML = 'Listing Form';

            const leftsidewrapper = document.querySelector('.left-side');
            
            leftsidewrapper.style.overflow = 'scroll';

            

      // Access the listing data form
      const listing_info = contact_form_data.listing_form_info;

      // Create the table element
      const table = document.createElement('table');

      // Create the table header
      const tableHeader = document.createElement('tr');
      const headers = ['Customer Id', 'Customer Name', 'Email Address', 'Phone No', 'Property Location', 'Concern'];

      headers.forEach(headerText => {
        const header = document.createElement('th');
        header.textContent = headerText;
        tableHeader.appendChild(header);
      });

      // Append the table header to the table
      table.appendChild(tableHeader);

      // Create the table body
      const tableBody = document.createElement('tbody');

      // Create a row for each data entry
      listing_info.forEach(listing => {
        // Create a row for each review
        const row = document.createElement('tr');

        // Create cells for each column
        const idCell = document.createElement('td');
        idCell.textContent = listing.listing_msg_id ;
        row.appendChild(idCell);


        const nameCell = document.createElement('td');
        nameCell.textContent = listing.name;
        row.appendChild(nameCell);

        const emailCell = document.createElement('td');
        emailCell.textContent = listing.email;
        row.appendChild(emailCell);

        const phone_numberCell = document.createElement('td');
        phone_numberCell.textContent = listing.phone_number;
        row.appendChild(phone_numberCell);

        const property_locationCell = document.createElement('td');
        property_locationCell.textContent = listing.property_location;
        row.appendChild(property_locationCell);

        const concernCell = document.createElement('td');
        concernCell.textContent = listing.concern;
        row.appendChild(concernCell);


        // Append the row to the table body
        tableBody.appendChild(row);

       

      });

      // Append the table body to the table
      table.appendChild(tableBody);



      // Append the table to the left-side-container
      leftSideContainer.appendChild(table);

    })
    .catch(error => console.error(error));
}
function viewlistinginfo(){

               // Get the left-side-container element
               const leftSideContainer = document.getElementById('left-side-container');
 
               // Clear the container before appending the table
               leftSideContainer.innerText = '';
   
               const dashbord = document.querySelector('.dashbord');
   
               dashbord.innerHTML = 'See Properties Listing';
  // Create the container element
const container = document.createElement('div');
container.classList.add('add-listing-container', 'd-flex', 'justify-content-around');

// Create the "Add property to trending list" div
const trendingPropertyDiv = document.createElement('div');
trendingPropertyDiv.classList.add('trending-property', 'p-2');
trendingPropertyDiv.textContent = 'See trending properties list ';
trendingPropertyDiv.onclick = function(event) {
  viewlisting(event);
};

// Create the "Add property to Listing" div
const propertyListingDiv = document.createElement('div');
propertyListingDiv.classList.add('property-listing', 'p-2');
propertyListingDiv.textContent = 'See all properties List';
propertyListingDiv.onclick = function(event) {
  viewlisting(event);
};

// Append the div elements to the container
container.appendChild(trendingPropertyDiv);
container.appendChild(propertyListingDiv);

// Append the container to the desired parent element in your HTML
      // Append the table to the left-side-container

      leftSideContainer.appendChild(container);
}


// this is for to watch the list of property avaiable

function viewlisting(event) {
  fetch('../database.php')
     .then(response => response.json())
     .then(data => {
 
      let clickedElement = event.target;
             // Get the left-side-container element
             const leftSideContainer = document.getElementById('left-side-container');
 
             // Clear the container before appending the table
             leftSideContainer.innerText = '';
 
             const dashbord = document.querySelector('.dashbord');
 
 
             const leftsidewrapper = document.querySelector('.left-side');
 
             leftsidewrapper.style.overflow = 'scroll';

             let trending_list = document.querySelector('.trending-property');

             let all_listing = document.querySelector('.property-listing');
 
       // Access the client data
       let view_listing; 
       
       if (clickedElement.classList.contains('trending-property')) {
        view_listing = data.properties;
        dashbord.innerHTML = 'Trending Listing';
      } else if (clickedElement.classList.contains('property-listing')) {
        view_listing = data.all_properties_data;
        dashbord.innerHTML = 'All properties Listing';
      }
 
       // Create the table element
       const table = document.createElement('table');
 
       // Create the table header
       const tableHeader = document.createElement('tr');
       const headers = ['Id', 'Property title', 'Price', 'Description', 'Beds', 'Baths', 'Square feet', 'Status', 'Seller Name', 'Seller Image', 'Property Image'];
 
       headers.forEach(headerText => {
         const header = document.createElement('th');
         header.textContent = headerText;
         tableHeader.appendChild(header);
       });
 
       // Append the table header to the table
       table.appendChild(tableHeader);
 
       // Create the table body
       const tableBody = document.createElement('tbody');
 
       // Create a row for each data entry
       view_listing.forEach(listing => {
         // Create a row for each review
         const row = document.createElement('tr');
 
         // Create cells for each column
         const idCell = document.createElement('td');
         if (clickedElement.classList.contains('trending-property')) {
          idCell.textContent = listing.id;
        } else if (clickedElement.classList.contains('property-listing')) {
          idCell.textContent = listing.all_properties_id;
        }
         row.appendChild(idCell);
 
         const NameCell = document.createElement('td');
         NameCell.textContent = listing.name;
         row.appendChild(NameCell);
 
         const priceCell = document.createElement('td');
         priceCell.textContent = listing.price;
         row.appendChild(priceCell);
 
         const descriptionCell = document.createElement('td');
         descriptionCell.textContent = listing.small_description	;
         row.appendChild(descriptionCell);
 
         const 	bathsCell = document.createElement('td');
         bathsCell.textContent = listing.baths;
         row.appendChild(bathsCell);

         const bedsCell = document.createElement('td');
         bedsCell.textContent = listing.beds;
         row.appendChild(bedsCell);
 
         const 	sqftCell = document.createElement('td');
         sqftCell.textContent = listing.sqft;
         row.appendChild(sqftCell);

         const statusCell = document.createElement('td');
         statusCell.textContent = listing.status;
         row.appendChild(statusCell);

         const seller_nameCell = document.createElement('td');
         seller_nameCell.textContent = listing.seller_name;
         row.appendChild(seller_nameCell);

 
         const sellerimageCell = document.createElement('td');
         sellerimageCell.textContent = listing.seller_img ? 'Yes' : 'No';
         row.appendChild(sellerimageCell);

         const imageCell = document.createElement('td');
         imageCell.textContent = listing.image ? 'Yes' : 'No';
         row.appendChild(imageCell);
 
         // Append the row to the table body
         tableBody.appendChild(row);
       });
 
       // Append the table body to the table
       table.appendChild(tableBody);
 
 
 
       // Append the table to the left-side-container
       leftSideContainer.appendChild(table);
 
     })
     .catch(error => console.error(error));
 }


 function addlistinginfo(event){


  // Get the left-side-container element
  const leftSideContainer = document.getElementById('left-side-container');

  // Clear the container before appending the table
  leftSideContainer.innerText = '';

  const dashbord = document.querySelector('.dashbord');

  dashbord.innerHTML = 'Add Properties Listing';
// Create the container element
const container = document.createElement('div');
container.classList.add('add-listing-container', 'd-flex', 'justify-content-around');

// Create the "Add property to trending list" div
const trendingPropertyDiv = document.createElement('div');
trendingPropertyDiv.classList.add('trending-property', 'p-2');
trendingPropertyDiv.textContent = 'Add properties to trending list ';
trendingPropertyDiv.onclick = function(event) {
  addlistingform(event);
};

// Create the "Add property to Listing" div
const propertyListingDiv = document.createElement('div');
propertyListingDiv.classList.add('property-listing', 'p-2');
propertyListingDiv.textContent = 'Add properties to all properties List';
propertyListingDiv.onclick = function(event) {
addlistingform(event);
};

// Append the div elements to the container
container.appendChild(trendingPropertyDiv);
container.appendChild(propertyListingDiv);

// Append the container to the desired parent element in your HTML
// Append the table to the left-side-container

leftSideContainer.appendChild(container);
}

function addlistingform(event){

  let clickedElement = event.target;

    // Get the left-side-container element
    const leftSideContainer = document.getElementById('left-side-container');

    // Clear the container before appending the table
    leftSideContainer.innerText = '';
  
    // const dashbord = document.querySelector('.dashbord');
  
    // dashbord.innerHTML = 'Add Properties Listing';

  const container = document.createElement('div');  
  container.classList.add('add-listing-input-field');

// Create a new form element
const form = document.createElement("form");
form.classList.add('listing-form-container');
container.appendChild(form);


// Create a new form element
const form_group1 = document.createElement('div');
form_group1.classList.add('form-group', 'row', 'contact-row')

// Create a new form element
const form_group2 = document.createElement('div');
form_group2.classList.add('form-group', 'row', 'contact-row')

// Create a new form element
const form_group3 = document.createElement('div');
form_group3.classList.add('form-group', 'row', 'contact-row')


// Create a new form element
const form_group4 = document.createElement('div');
form_group4.classList.add('form-group', 'row', 'contact-row')


// Create a new form element
const form_group5 = document.createElement('div');
form_group5.classList.add('form-group', 'mb-4')

// Create a new form element
const btn_container = document.createElement('div');
btn_container.classList.add('container', 'd-flex', 'justify-content-center')

form.appendChild(form_group1);
form.appendChild(form_group2);
form.appendChild(form_group3);
form.appendChild(form_group4);
form.appendChild(form_group5);
form.appendChild(btn_container);


// Create a name container element
const namecontainer = document.createElement('div');
namecontainer.classList.add('col-sm-6', 'mb-1', 'mb-sm-3');

// create a price container element 
const pricecontainer = document.createElement('div');
pricecontainer.classList.add('col-sm-6', 'mb-1', 'mb-sm-3');

// append them to the first form group
form_group1.appendChild(namecontainer);
form_group1.appendChild(pricecontainer);

// Create a status container element
const statuscontainer = document.createElement('div');
statuscontainer.classList.add('col-sm-6', 'mb-1', 'mb-sm-3');

// create a price container element 
const seller_namecontainer = document.createElement('div');
seller_namecontainer.classList.add('col-sm-6', 'mb-1', 'mb-sm-3');

// append them to the second form group
form_group2.appendChild(statuscontainer);
form_group2.appendChild(seller_namecontainer);

// Create a bed container element
const bedcontainer = document.createElement('div');
bedcontainer.classList.add('col-md-4', 'col-sm-6', 'mb-3');

// create a bath container element 
const bathcontainer = document.createElement('div');
bathcontainer.classList.add('col-md-4', 'col-sm-6', 'mb-3');

// create a sqft container element 
const sqftcontainer = document.createElement('div');
sqftcontainer.classList.add('col-md-4', 'col-sm-6', 'mb-3');

// append them to the second form group
form_group3.appendChild(bedcontainer);
form_group3.appendChild(bathcontainer);
form_group3.appendChild(sqftcontainer);

// Create a status container element
const sellerimgcontainer = document.createElement('div');
sellerimgcontainer.classList.add('col-sm-6', 'mb-1', 'mb-sm-3');

// create a price container element 
const imgcontainer = document.createElement('div');
imgcontainer.classList.add('col-sm-6', 'mb-1', 'mb-sm-3');

// append them to the second form group
form_group4.appendChild(sellerimgcontainer);
form_group4.appendChild(imgcontainer);


const namelabel = document.createElement('label');
namelabel.classList.add('mb-1');
namelabel.innerText = 'Enter Property title*';
namelabel.id = 'titlelabel';

const nameinput = document.createElement('input');
nameinput.classList.add('add-listing-input');
nameinput.type = 'text';
nameinput.placeholder = 'Property title';
nameinput.id = 'titleinput';

namecontainer.appendChild(namelabel);
namecontainer.appendChild(nameinput);

const pricelabel = document.createElement('label');
pricelabel.classList.add('mb-1');
pricelabel.innerText = 'Enter the Price*';
pricelabel.id = 'pricelabel';

const priceinput = document.createElement('input');
priceinput.classList.add('add-listing-input');
priceinput.type = 'text';
priceinput.placeholder = 'Property price'
priceinput.id = 'priceinput';

pricecontainer.appendChild(pricelabel);
pricecontainer.appendChild(priceinput);


const Statuslabel = document.createElement('label');
Statuslabel.classList.add('mb-1');
Statuslabel.innerText = 'Enter Status*';
Statuslabel.id = 'statuslabel';

const statusinput = document.createElement('input');
statusinput.classList.add('add-listing-input');
statusinput.type = 'text';
statusinput.placeholder = 'Property status'
statusinput.id = 'statusinput';

statuscontainer.appendChild(Statuslabel);
statuscontainer.appendChild(statusinput);

const seller_namelabel = document.createElement('label');
seller_namelabel.classList.add('mb-1');
seller_namelabel.innerText = 'Enter seller name*';
seller_namelabel.id = 'seller_namelabel';

const seller_nameinput = document.createElement('input');
seller_nameinput.classList.add('add-listing-input');
seller_nameinput.type = 'text';
seller_nameinput.placeholder = 'Seller Name'
seller_nameinput.id = 'seller_nameinput';

seller_namecontainer.appendChild(seller_namelabel);
seller_namecontainer.appendChild(seller_nameinput);

const bedlabel = document.createElement('label');
bedlabel.classList.add('mb-1');
bedlabel.innerText = 'Bedrooms*';
bedlabel.id = 'bedlabel';

const bedinput = document.createElement('input');
bedinput.classList.add('add-listing-input');
bedinput.type = 'text';
bedinput.placeholder = 'bedrooms'
bedinput.id = 'bedinput';

bedcontainer.appendChild(bedlabel);
bedcontainer.appendChild(bedinput);

const bathlabel = document.createElement('label');
bathlabel.classList.add('mb-1');
bathlabel.innerText = 'Bathrooms*';
bathlabel.id = 'bathlabel';

const bathinput = document.createElement('input');
bathinput.classList.add('add-listing-input');
bathinput.type = 'text';
bathinput.placeholder = 'bathrooms'
bathinput.id = 'bathinput';

bathcontainer.appendChild(bathlabel);
bathcontainer.appendChild(bathinput);

const sqftlabel = document.createElement('label');
sqftlabel.classList.add('mb-1');
sqftlabel.innerText = 'Square Feet*';
sqftlabel.id = 'sqftlabel';

const sqftinput = document.createElement('input');
sqftinput.classList.add('add-listing-input');
sqftinput.type = 'text';
sqftinput.placeholder = 'Square Feet'
sqftinput.id = 'sqftinput';

sqftcontainer.appendChild(sqftlabel);
sqftcontainer.appendChild(sqftinput);

const seller_imglabel = document.createElement('label');
seller_imglabel.classList.add('mb-1');
seller_imglabel.innerText = 'Enter Seller Image*';
seller_imglabel.id = 'seller_imglabel';

const seller_imgnput = document.createElement('input');
seller_imgnput.classList.add('add-listing-input');
seller_imgnput.type = 'file';
seller_imgnput.id = 'seller_imgnput';

sellerimgcontainer.appendChild(seller_imglabel);
sellerimgcontainer.appendChild(seller_imgnput);

const imglabel = document.createElement('label');
imglabel.classList.add('mb-1');
imglabel.innerText = 'Enter property Image*';
imglabel.id = 'imglabel';

const imginput = document.createElement('input');
imginput.classList.add('add-listing-input');
imginput.type = 'file';
imginput.id = 'imginput';

imgcontainer.appendChild(imglabel);
imgcontainer.appendChild(imginput);


const concernlabel = document.createElement('label');
concernlabel.classList.add('mb-1');
concernlabel.innerText = 'Please enter your concern*';
concernlabel.id = 'concernlabel';

const textarea = document.createElement('textarea');
textarea.classList.add('form-control');
textarea.id = "add-listing-description";
textarea.placeholder = "Enter your message";
// append them to the second form group
form_group5.appendChild(concernlabel);
form_group5.appendChild(textarea);

const btn = document.createElement('button');
if (clickedElement.classList.contains('trending-property')) {
  btn.classList.add('submit-btn', 'p-2', 'add-to-trending');

} else if (clickedElement.classList.contains('property-listing')) {
  btn.classList.add('submit-btn', 'p-2', 'add-to-all-collection');

}
btn.innerText = 'Add Further details';
btn.onclick = function(event) {
  addpropertylisting(event);
  };

btn_container.appendChild(btn);

leftSideContainer.appendChild(container)

};

function addpropertylisting(event) {
  event.preventDefault();
  let clickedElement = event.target;
  let tableName;
  if (clickedElement.classList.contains('add-to-trending')) {
    tableName = 'properties_collection_basic';
    console.log(tableName);

  } else if (clickedElement.classList.contains('add-to-all-collection')) {
    tableName = 'main_properties_collection';
    console.log(tableName);
  }

  let inputfield = document.getElementsByClassName('add-listing-input');
  let concernmsg = document.querySelector('#add-listing-description')

  for (let i = 0; i < inputfield.length; i++) {
    if (inputfield[i].value.trim() === '') {
      inputfield[i].previousElementSibling.textContent = 'Please fill this field*';
      inputfield[i].previousElementSibling.style.color = 'red';
      inputfield[i].style.border = "1px solid red";
      return false;
    }else{
      inputfield[i].previousElementSibling.textContent = 'Good*';
      inputfield[i].previousElementSibling.style.color = 'green';
      inputfield[i].style.border = "1px solid green";
    }
  }
  if(concernmsg.value.trim()===''){
    concernmsg.previousElementSibling.textContent = 'Please fill this field*';
    concernmsg.previousElementSibling.style.color = 'red';
    concernmsg.style.border = "1px solid red";
    return false;
  }else{
    concernmsg.previousElementSibling.textContent = 'Good*';
    concernmsg.previousElementSibling.style.color = 'green';
    concernmsg.style.border = "1px solid green";
  }

const reader1 = new FileReader();
const reader2 = new FileReader();
let image1 ;
let image2 ;

const listingdata = {
  property_title: inputfield[0].value,
  property_price: inputfield[1].value,
  property_status: inputfield[2].value,
  property_seller_name: inputfield[3].value,
  property_bed: inputfield[4].value,
  property_bath: inputfield[5].value,
  property_sqft: inputfield[6].value,
  property_seller_img: '',
  property_img: '',
  property_concern: concernmsg.value,
  table_name: tableName
}

reader1.addEventListener('load', function() {
   image1 = reader1.result
   console.log(image1)
   listingdata.property_seller_img = image1;

   processListingData();
  });

  reader1.readAsDataURL(inputfield[7].files[0]);
  console.log( `error123 ${image1}`)


reader2.addEventListener('load', function() {
   image2 = reader2.result
   listingdata.property_img = image2;

   processListingData();

  })



  reader2.readAsDataURL(inputfield[8].files[0]);
  function processListingData() {
    // Check if both images have been loaded
    if (image1 && image2 && tableName) {
      $.ajax({
        url: '../database.php',
        method: 'POST',
        data: { listingdata: JSON.stringify(listingdata) },
        success: function(response) {
          // Handle the success response
          confirm('Your Review has been saved successfully. You can see it on the page and if you do not see it, please try refreshing the page.');
          console.log(`This is json img: ${JSON.stringify(listingdata['property_seller_img'])}`);

        // After the data is saved in main_properties_collection, create input forms for other tables
        createOtherInputForms(tableName);
        },
        error: function(xhr, status, error) {
          // Handle the error response
          console.error('Error property listing review:', error);
        }
      });
    }
  }


  function createOtherInputForms(tableName) {
    // Create an input form for the property_images table
   
      const imageFormContainer = document.createElement('div');
      // Customize the container and input fields as per your requirements
      // ...
  
      // Append the form container to the desired location on the page
      // ...
   
  
    // Create an input form for the interior_details table
    
      const interiorFormContainer = document.createElement('div');
      // Customize the container and input fields as per your requirements
      // ...
  
      // Append the form container to the desired location on the page
      // ...
    
  
    // Create an input form for the property_features table
    
      const featuresFormContainer = document.createElement('div');
      // Customize the container and input fields as per your requirements
      // ...
  
      // Append the form container to the desired location on the page
      // ...
   
  
    // Create an input form for the video_details table
    
      const videoFormContainer = document.createElement('div');
      // Customize the container and input fields as per your requirements
      // ...
  
      // Append the form container to the desired location on the page
      // ...
    
  
    // Create an input form for the previous_year_values table

      const previousYearFormContainer = document.createElement('div');
      // Customize the container and input fields as per your requirements
      // ...
  
      // Append the form container to the desired location on the page
      // ...
   
  }
  // console.log(listingdata);
  // alert(listingdata)
  // Submit the form if all fields are filled.
  // return true;

}