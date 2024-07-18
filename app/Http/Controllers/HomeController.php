<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index() {

        //QueryBuilder
        /* DB::table('users')->insert([
            [
                'name' => 'Nguyễn Văn A',
                'email' => 'a@gmail.com',
                'password' => bcrypt(2345678)
            ],
            [
                'name' => 'Nguyễn Văn B',
                'email' => 'b@gmail.com',
                'password' => bcrypt(2345678)
            ],
            [
                'name' => 'Nguyễn Văn C',
                'email' => 'c@gmail.com',
                'password' => bcrypt(2345678)
            ],
        ]); */

        //


        //Ilouquet

        /* User::insert([
            [
                'name' => 'Nguyễn Văn D',
                'email' => 'd@gmail.com',
                'password' => bcrypt(2345678)
            ],
            [
                'name' => 'Nguyễn Văn E',
                'email' => 'e@gmail.com',
                'password' => bcrypt(2345678)
            ],
            [
                'name' => 'Nguyễn Văn F',
                'email' => 'f@gmail.com',
                'password' => bcrypt(2345678)
            ]
        ]); */

        // DB::table('users')->where('email', 'a@gmail.com')->delete();
        // User::query()->where('email', 'b@gmail.com')->delete();

        // ---Bai 1:
        // Cau 1:
        $data1 =  DB::table('users')->get();

        $data2 =  User::query()->get();

        // Cau 2: 
        $data3 = DB::table('users')->where('age', '>' , 25)->get();

        $data4 =  User::query()->where('age', '>' , 25)->get();

        // Cau 3
        $data5 =  DB::table('users')->where('age', '>' , 25)->get();

        $data6 = User::query()->where([
            ['age', '>' , 25],
            ['status', 'acitive']
        ])->get();
        
        // Cau 4:
        $query = DB::table('users')->orderByDesc('id')->get();  
        
        $query = User::query()->orderByDesc('id')->get();  

        // Cau 5:
        DB::table('products')->limit(10);
        User::query()->limit(10);

        //Cau6:
        DB::table('orders')->where('status', 'completed')->orWhere('total', '>', 100)->ddRawSql();

        User::query()->where('status', 'completed')->orWhere('total', '>', 100)->get();

        //Cau 7: 
        DB::table('customers')->where('name', 'like', 'John')->ddRawSql();
        User::query()->where('name', 'like', 'John')->get();

        //Cau 8:

        DB::table('sales')->whereBetween('amount', [1000,5000])->ddRawSql();

        //Cau 9:
        DB::table('employees')->whereIn('department_id', [1,2,3])->ddRawSql();

        //Câu 10:

        DB::table('orders')->join('customers', 'orders.customer_id', '=', 'customers.id')
        ->select('orders.*','customers.*')->get();

        // Câu 11:

        DB::table('order_items')->select(DB::raw('sum(quantity) as total'))->groupBy('product_id')->get();

        //Câu 12:

        DB::table('orders')->where('status', 'processing')->update(['status' => 'shipped']);

        //Cau 13:

        DB::table('logs')->whereTime('created_at', '=', '2020-01-01')
        ->delete();

        //Cau 14:

        User::query()->create([
            'name' => 'San pham 1',
            'price' => 5000,
            'quantity' => 5
        ]);

        //Cau 15

        DB::table('users')->selectRaw('birth_date * ? as thang', [5])->get();


        // Bai 2:

        // Cau1 :

        DB::table('emoloyees e')->join('departments  d', 'e.department_id', '=', 'd.department_id')->where('d.department_name', 'IT')->select('e.first_name', 'e.last_name', 'd.department_name')->get();

        //Cau2:

        DB::table('emoloyees e')->join('departments  d', 'e.department_id', '=', 'd.department_id')->where([
            ['e.salary','>', 7000],
            ['d.department_name', 'Marketing']
        ])->select('e.first_name', 'e.last_name', 'd.department_name')->get();


        //Cau 3:

        DB::table('emoloyees e')->join('departments  d', 'e.department_id', '=', 'd.department_id')->whereBetween('e.salary' , [5000,7000])->select('e.first_name', 'e.last_name', 'd.department_name')->get();
        

        // Cau 4:
        
        DB::table('emoloyees e')->join('departments  d', 'e.department_id', '=', 'd.department_id')->where('d.department_name','<>', 'HR')->select('e.first_name', 'e.last_name', 'd.department_name')->get();

        // Cau 5:

        DB::table('emoloyees e')->join('departments  d', 'e.department_id', '=', 'd.department_id')->where('e.last_name','like', 'D%')->select('e.first_name', 'e.last_name', 'd.department_name')->get();

        // Cau 6:

        // DB::table('emoloyees e')->join('departments  d', 'e.department_id', '=', 'd.department_id')->where()->select('e.first_name', 'e.last_name', 'd.department_name')->get();

        
         


    }
}
