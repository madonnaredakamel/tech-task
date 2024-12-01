// Mock Data (replace this with API calls later)

// manual for front end without backend
// const categories = [
//     { id: 1, name: "Programming", count: 5 },
//     { id: 2, name: "Design", count: 3 },
//     { id: 3, name: "Business", count: 2 },
//   ];
  
//   const courses = [
//     { id: 1, title: "JavaScript Basics", description: "Learn JavaScript", categoryId: 1, categoryName: "Programming" },
//     { id: 2, title: "Advanced CSS", description: "Master CSS for web design", categoryId: 2, categoryName: "Design" },
//     { id: 3, title: "Marketing 101", description: "Basics of marketing", categoryId: 3, categoryName: "Business" },
//   ];
  
//   // DOM Elements
//   const categoryList = document.getElementById("category-list");
//   const courseList = document.getElementById("course-list");
  
//   // Load Categories
//   function loadCategories() {
//     categoryList.innerHTML = "";
//     categories.forEach((category) => {
//       const li = document.createElement("li");
//       li.textContent = `${category.name} (${category.count})`;
//       li.onclick = () => filterCourses(category.id);
//       categoryList.appendChild(li);
//     });
//   }
  
//   // Load Courses
//   function loadCourses(filteredCourses = courses) {
//     courseList.innerHTML = "";
//     filteredCourses.forEach((course) => {
//       const div = document.createElement("div");
//       div.classList.add("course-card");
//       div.innerHTML = `
//         <h3>${course.title}</h3>
//         <p>${course.description}</p>
//         <small>Main category: ${course.categoryName}</small>
//       `;
//       courseList.appendChild(div);
//     });
//   }
  
//   // Filter Courses by Category
//   function filterCourses(categoryId) {
//     const filtered = courses.filter((course) => course.categoryId === categoryId);
//     loadCourses(filtered);
//   }
  
//   // Initialize Page
//   loadCategories();
//   loadCourses();

  
  async function fetchCategories() {
    const response = await fetch('http://api.cc.localhost/categories');
    const data = await response.json();
    return data;
  }
  
  async function fetchCourses() {
    const response = await fetch('http://api.cc.localhost/courses');
    const data = await response.json();
    return data;
  }