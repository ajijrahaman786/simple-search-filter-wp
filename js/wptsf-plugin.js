document.addEventListener("DOMContentLoaded", function () {
  // Get the reference to the table header row, to the table body,
  const tableHeaderElement = document.getElementById("table-header-row");
  const TbodyElement = document.getElementById("table-body");
  // Define the initial data array
  const dataArray = [
    { Flavor: "Vanilla", Brand: "Iced Creams", Calories: "240" },
    {
      Flavor: "Chocolate Delight",
      Brand: "Brooklyn Creamery",
      Calories: "320",
    },
    { Flavor: "Caramel", Brand: "Brooklyn Creamery", Calories: "410" },
    {
      Flavor: "Strawberry Swirl",
      Brand: "Natural Sweet Shop",
      Calories: "200",
    },
    { Flavor: "Mint Chip", Brand: "Brooklyn Creamery", Calories: "230" },
    { Flavor: "Butterscotch", Brand: "Iced Creams", Calories: "299" },
    { Flavor: "Hazelnut", Brand: "Iced Creams", Calories: "240" },
    { Flavor: "Pistachio", Brand: "Iced Creams", Calories: "299" },
    { Flavor: "Raspberry", Brand: "Iced Creams", Calories: "300" },
    { Flavor: "Caramel Machiatto", Brand: "Iced Creams", Calories: "130" },
    { Flavor: "Ajij", Brand: "Iced Creams", Calories: "299" },
    { Flavor: "Hazelnut", Brand: "Iced Creams", Calories: "240" },
    { Flavor: "Pistachio", Brand: "Iced Creams", Calories: "299" },
    { Flavor: "Raspberry", Brand: "Iced Creams", Calories: "300" },
    { Flavor: "Caramel Machiatto", Brand: "Iced Creams", Calories: "130" },
  ];

  // Function to populate the table with data
  function tableData(data) {
    let tHeaderRow = document.createElement("tr");
    // Loop through the keys of the first data object to create table headers
    for (const key in data[0]) {
      let theadData = document.createElement("th");
      theadData.innerText = key;
      tHeaderRow.append(theadData);
    }
    // Append the header row to the table's header element
    tableHeaderElement.append(tHeaderRow);
    // Loop through each data object to create table rows and cells
    data.forEach(function (element, index) {
      let tbodyRow = document.createElement("tr");
      let tbodyData1 = document.createElement("td");
      let tbodyData2 = document.createElement("td");
      let tbodyData3 = document.createElement("td");

      tbodyData1.innerText = element.Flavor;
      tbodyData2.innerText = element.Brand;
      tbodyData3.innerText = element.Calories;
      // Append the cells to the row
      tbodyRow.append(tbodyData1, tbodyData2, tbodyData3);
      // Append the row to the table's body element
      TbodyElement.append(tbodyRow);
    });
  }
  // Call the function to populate the table with data from the dataArray
  tableData(dataArray);

  
  function searchInputData(){
    // Get the reference to the search bar input element
    const filterElement = document.getElementById("search-bar");

    filterElement.addEventListener("keyup", function(){
      let filterValue = filterElement.value;
      // console.log(filterValue);
      let tbodyRow = TbodyElement.getElementsByTagName("tr");
      console.log(tbodyRow);
      for (let index = 0; index < tbodyRow.length; index++) {
        const tableHeading = tbodyRow[index].getElementsByTagName("td")[0];
        console.log(tableHeading);

        if(tableHeading){
          const cellText  = tableHeading.textContent || tableHeading.innerText;
          const isVisible = cellText.toLowerCase().includes(filterValue);
          console.log(isVisible);
          if(isVisible){
            tbodyRow[index].style.display = "";
          }else{
            tbodyRow[index].style.display = "none";
          }
        }

        
      }


    });

  }

  searchInputData();


  
});
