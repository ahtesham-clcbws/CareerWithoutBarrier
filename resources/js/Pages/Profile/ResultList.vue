<template>
  <Head title="Dashboard" />

  <AuthenticatedLayout>
    <template #header>
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">Result</h2>
    </template>

    <div class="color">
      <img
        src="http://127.0.0.1:8000/website/assets/images/brand/logo.png"
        alt="Logo"
        class="block h-9 w-auto"
      />

      <img
        src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTCzGnMQx1_2ZrXDeP5ZD_O6sf-A4aAlf7LPYwig-CAKA&s"
        alt="print"
        class="block h-9 w-auto"
        style="float: right; cursor: pointer"
        @click="printPage"
      />

      <h1
        align="center"
        style="
          font-family: cambria;
          font-size: 40px;
          text-decoration: underline;
        "
      >
        Scholorship Exam(08/04/2024)
      </h1>
      <fieldset>
        <legend>STUDENT INFORMATION</legend>
        <table align="center" id="tbl">
          <tr>
            <td width="200">Name:</td>
            <td>{{ results[0].name }}</td>
            <td>&nbsp; &nbsp;Father's Name: {{ results[0].father_name }}</td>
            <td>DOB : 16/12/1989</td>
          </tr>
          <tr>
            <td width="200">Center Name:</td>
            <td>{{ results[0].center_name }}</td>
            <td style="text-indent: 16px">Course: Banking</td>
            <td>Roll No : 123</td>
          </tr>
        </table>
      </fieldset>
      <br />

      <fieldset>
        <legend>SUBJECTS MARKS</legend>
        <table id="tbl2">
          <tr v-for="(result, index) in results" :key="index">
            <td>{{ result.subject }}</td>
            <td>{{ result.marks }}</td>
            <td>{{ result.write_answer }}</td>
          </tr>
          <tr style="background-color: #069; color: #fff">
            <td></td>
            <td>
              <b>Total Marks </b>
              {{ totalMarks }}
            </td>
            <td>
              <b>Remark : </b>
              {{ remarks }}
            </td>
          </tr>
        </table>
      </fieldset>
    </div>
  </AuthenticatedLayout>
</template>

  <script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Head } from "@inertiajs/vue3";

// Dummy data
const results = [
  {
    id: 1,
    name: "John Doe",
    father_name: "Michael Doe",
    center_name: "ABC Center",
    subject: "Mathematics",
    marks: 90,
    write_answer: "Lorem ipsum dolor sit amet",
    wrong_total_marks: 5,
  },
  {
    id: 2,
    name: "Jane Doe",
    father_name: "Jessica Doe",
    center_name: "XYZ Center",
    subject: "Science",
    marks: 75,
    write_answer: "Consectetur adipiscing elit",
    wrong_total_marks: 7,
  },
  {
    id: 3,
    name: "Jane Doe",
    father_name: "Jessica Doe",
    center_name: "XYZ Center",
    subject: "PHP",
    marks: 95,
    write_answer: "Consectetur adipiscing elit",
    wrong_total_marks: 7,
  },
  {
    id: 4,
    name: "Jane Doe",
    father_name: "Jessica Doe",
    center_name: "XYZ Center",
    subject: "JAVA",
    marks: 95,
    write_answer: "Consectetur adipiscing elit",
    wrong_total_marks: 7,
  },
  {
    id: 5,
    name: "Jane Doe",
    father_name: "Jessica Doe",
    center_name: "XYZ Center",
    subject: "Flutter",
    marks: 95,
    write_answer: "Consectetur adipiscing elit",
    wrong_total_marks: 7,
  },
  // Add more dummy data as needed
];

// Calculate total marks
const totalMarks = results.reduce((acc, result) => acc + result.marks, 0);

// Calculate remarks (dummy calculation, adjust as per your logic)
const remarks = totalMarks > 70 ? "Good" : "Average";
function printPage() {
  window.print();
}
</script>

  <style scoped>
/* Add your custom styles here */
.color {
  border-radius: 20px;
  border: 1px solid black; /* Add border */
  padding: 20px;
  background-color: #fff;
  margin: 20px;
}

#tbl,
#tbl2 {
  border-collapse: collapse;
  font-size: 18px;
  font-family: Century Gothic;
  width: 100%;
}

#tbl td,
#tbl2 td {
  padding: 8px;
  border: 1px solid black; /* Add border */
}

legend {
  font-weight: bold;
}
</style>
