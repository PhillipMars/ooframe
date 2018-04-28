<?php
  define("DD", realpath("../"));
  require DD . "/vendor/autoload.php";
  use Wpa28\App\Application;
  use Wpa28\Foo\Application as FooApplication;
  use Wpa28\App\Bar;

  // kick();
  //
  // test();

  class Test{
    public function index() {
      var_dump("Index");
    }
  }

class Another{
  public function index() {
    var_dump("ANOTHER");
  }
}

  Application::add(new Test());
  $test = Application::get("test");
  $test->index();
  Application::add(new Another());
  $another = Application::get("another");
  $another->index();



  
  // $students = DB::table("students")->get();
  // foreach ($students as $stu) {
  //   var_dump($stu->name);
  // }

  //$class = DB::table("classess")->get();

  // $student  = HhDB::table("students")->where("id", 1)->get();
  // $student_1 = HhDB::table("students")->select("id", "name")->get();
  // var_dump($student_1);
  // var_dump($student);

  // $student = HDB::table("students")->where(["id" => 1])->get();
  // var_dump($student);

  // $db = new DB();
  // $config = new ConfigProvider();
 ?>
