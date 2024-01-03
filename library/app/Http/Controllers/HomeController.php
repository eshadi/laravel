<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Catalog;
use App\Models\Publisher;
use App\Models\Transaction;
use App\Models\Book;
use App\Models\Member;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // // $members = Member::with('user')->get();
        
        // //no.1
        // $data1 = Member::select('*') 
        //                 ->join ('users','users.member_id','=','members.id')
        //                 ->get();
        // //no.2
        // $data2 = Member::select('*')
        //                 ->leftjoin ('users','users.member_id','=','members.id')
        //                 ->where('users.id', NULL)
        //                 ->get();
        // //no.3
        // $data3 = Transaction::select('members.id', 'members.name')
        //                 ->rightjoin ('members','members.id','=','transactions.member_id', NULL)
        //                 ->where('transactions.member_id', NULL)
        //                 ->get();
        // //no.4
        // $data4 = Member::select('members.id', 'members.name', 'members.phone_number')
        //                 ->join('transactions','transactions.member_id', '=', 'members.id')
        //                 ->orderBy('members.id','asc')
        //                 ->get();
        // //no.5
        // $data5 = Member::select('members.id', 'members.name', 'members.phone_number')
        //                 ->join('transactions','transactions.member_id','=', 'members.id')
        //                 ->groupBy('members.id', 'members.name', 'members.phone_number')
        //                 ->havingRaw('COUNT(members.name) < 1')
        //                 ->get();
        // //no.6
        // $data6 = Member::select('members.name', 'members.phone_number', 'members.address','transactions.date_start','transactions.date_end')
        //                 ->join('transactions', 'transactions.member_id', '=', 'members.id')
        //                 ->get();
        // //no.7
        // $data7 = Member::select('members.name','members.phone_number', 'members.address', 'transactions.date_start', 'transactions.date_end')
        //                 ->join('transactions', 'transactions.member_id', '=', 'members.id')
        //                 ->whereMonth('transactions.date_end', '=', '06')
        //                 ->get();
        // //no.8
        // $data8 = Member::select('members.name', 'members.phone_number', 'members.address', 'transactions.date_start', 'transactions.date_end')
        //                 ->join('transactions', 'transactions.member_id', '=', 'members.id')
        //                 ->whereMonth('transactions.date_start', '=', '05')
        //                 ->get();
        // //no.9
        // $data9 = Member::select('members.name', 'members.phone_number', 'members.address', 'transactions.date_start', 'transactions.date_end')
        //                 ->join('transactions', 'transactions.member_id', '=', 'members.id')
        //                 ->whereMonth('transactions.date_start', '=', '06', 'and', 'transactions.date_end', '=', '06')
        //                 ->get();
        // //no.10
        // $data10 = Member::select('members.name', 'members.phone_number', 'members.address', 'transactions.date_start', 'transactions.date_end')
        //                 ->join('transactions', 'transactions.member_id', '=', 'members.id')
        //                 ->where('members.address', 'LIKE',"%{new}%") 
        //                 ->get();
        // //no.11
        // $data11 = Member::select('members.name', 'members.phone_number', 'members.address', 'transactions.date_start', 'transactions.date_end')
        //                 ->join('transactions', 'transactions.member_id', '=', 'members.id')
        //                 ->where('members.address', 'LIKE',"%{new}%", 'and', 'members.gender', 'LIKE',"%{p}%")
        //                 ->get();
        // //no.12
        // $data12 = Member::select('members.name', 'members.phone_number', 'members.address', 'transactions.date_start', 'transactions.date_end', 'books.isbn', 'books.qty')
        //                 ->join('transactions', 'transactions.member_id', '=', 'members.id')
        //                 ->join('transaction_details', 'transaction_details.transaction_id', '=', 'transactions.id')
        //                 ->join('books' , 'books.id', '=','transaction_details.book_id')
        //                 ->where('books.qty', '>', '2')
        //                 ->get();
        // //no.13
        // $data13 = Member::select('members.name', 'members.phone_number', 'members.address', 'transactions.date_start', 'transactions.date_end', 'books.isbn', 'books.qty', 'books.title', 'books.price', \DB::raw('SUM(books.qty * books.price) as total'))
        //                 ->join('transactions', 'transactions.member_id', '=', 'members.id')
        //                 ->join('transaction_details', 'transaction_details.transaction_id', '=', 'transactions.id')
        //                 ->join('books' , 'books.id', '=','transaction_details.book_id')
        //                 ->groupBy('members.name', 'members.phone_number', 'members.address', 'transactions.date_start', 'transactions.date_end', 'books.isbn', 'books.qty', 'books.title', 'books.price')
        //                 ->get();
        // //no.14
        // $data14 = Member::select('members.name', 'members.phone_number', 'members.address', 'transactions.date_start', 'transactions.date_end', 'books.isbn', 'books.qty', 'books.title', 'publishers.name', 'authors.name', 'catalogs.name' )
        //                 ->join('transactions', 'transactions.member_id', '=', 'members.id')
        //                 ->join('transaction_details', 'transaction_details.transaction_id', '=', 'transactions.id')
        //                 ->join('books' , 'books.id', '=','transaction_details.book_id')
        //                 ->join('publishers', 'publishers.id', '=', 'books.publisher_id')
        //                 ->join('authors', 'authors.id', '=', 'books.author_id')
        //                 ->join('catalogs', 'catalogs.id', '=', 'books.catalog_id')
        //                 ->get();
        // //no.15
        // $data15 = Catalog::select('*','books.title')
        //                 ->join('books' , 'books.catalog_id', '=','catalogs.id')
        //                 ->get();
        // //no.16
        // $data16 = Book::select('*','publishers.name')
        //                 ->join('publishers' , 'publishers.id', '=','books.publisher_id')
        //                 ->get();
        // //no.17
        // $data17 = Book::selectRaw('COUNT(DISTINCT author_id) as total')
        //                 ->get();
        // //no.18
        // $data18 = Book::select('*')
        //                 ->where('books.price', '>', '15000')
        //                 ->get();
        // //no.19
        // $data19 = Book::select('*')
        //                 ->where('books.qty', '>','14')
        //                 ->get();
        // //no.20
        // $data20 = Member::select('*')
        //                 ->whereMonth('members.created_at', '=', '11')
        //                 ->get();
        
                        
            
        // return $data5;
        $total_member = Member::count();
        $total_book = Book::count();
        $total_transaction = Transaction::whereMonth('date_start', date('m'))->count();
        $total_publisher = Publisher::count();

        $data_donut = Book::select(DB::raw("COUNT(id_publisher) as total"))->groupBy('id_publisher')->orderBy('id_publisher', 'asc')->pluck('total');
        $data_donut = Publisher::orderBY('publishers.id', 'asc')->join('books', 'books.id_publisher', '=', 'publishers.id')->groupBy('name_publisher')->pluck('name_publisher');

        $label_bar = ['transactions', 'transaction_details']
        $data_bar = [];

        foreach ($label_bar as $key => $value) {
                            $data_bar[$key]['label'] = $label_bar[$key];
                            $data_bar[$key]['backgroundColor'] = $key == 0 ? 'rgba(60,141,188,0.9)' : 'rgba(210, 214, 222, 1)';
                            $data_month = [];

                            foreach (range(1,12) as $month) {
                                if ($key == 0) {
                                    $data_month[] = Transaction::select(DB::raw("COUNT(*) as total"))->whereMonth('date_start', $month)->first()->total;    
                                } else {
                                    $data_month[] = Transaction::select(DB::raw("COUNT(*) as total"))->whereMonth('date_end', $month)->first()->total;
                                }                        
                            }

                            $data_bar[$key]['data'] = $data_month; 
                        }                
        return view('home', compact('total_book', 'total_member', 'total_transactions', 'total_publisher', 'data_donut', 'label_donut', 'data_bar'));
    }
}
