<?php
declare(strict_types=1);

function insertData($pdo,$sql,$data):bool{
    if(count($data)==0) return false;
    if($stmt=$pdo->prepare($sql)){

        if($stmt->execute($data)){
            return true;
        }
        return false;
    }

}

//fill author
function fill_author($connect)
{
    //WHERE author_status = 'Enable'
	$query = "
	SELECT * FROM authors 
	WHERE authorId
	";

	$result = $connect->query($query);

	$output = '<option style="display:none;" value="">Select Author</option>';

	foreach($result as $row)
	{
		$output .= '<option value="'.$row["authorId"].'">'.$row["authorName"].'</option>';
	}

	return $output;
}
function fill_user_acc($connect)
{
    //WHERE author_status = 'Enable'
	$query = "SELECT userTypes FROM user_account";

	$result = $connect->query($query);

	$output = '<option style="display:none;" value="">Select user type</option>';

	foreach($result as $k=>$row)
	{
		$output .= '<option value="'.$row["userTypes"].'">'.$row["userTypes"].'</option>';
	}

	return $output;
}
//fill category
function fill_category($connect)
{
    //WHERE category_status = 'Enable' 
	$query = "
	SELECT * FROM category 
	";
	// ORDER BY categoryName ASC

	$result = $connect->query($query);

	$output = '<option style="display:none;" value="">Select Category</option>';

	foreach($result as $row)
	{
		$output .= '<option value="'.$row["categoryId"].'">'.$row["categoryName"].'</option>';
	}

	return $output;
}

//count book number
//WHERE book_status = 'Enable'
function total_book($connect)
{
	$total = 0;

	$query = "SELECT COUNT(bookId) AS Total FROM books ";

	$result = $connect->query($query);

	foreach($result as $row)
	{
		$total = $row["Total"];
	}

	return $total;
}
//count total author
//WHERE author_status = 'Enable'
function total_author($connect)
{
	$total = 0;

	$query = "SELECT COUNT(authorId) AS Total FROM authors ";

	$result  = $connect->query($query);

	foreach($result as $row)
	{
		$total = $row["Total"];
	}

	return $total;
}
//count total category
function total_category($connect)
{
	$total = 0;

	$query = "SELECT COUNT(categoryId) AS Total FROM category 
	";

	$result = $connect->query($query);

	foreach($result as $row)
	{
		$total = $row["Total"];
	}
	return $total;
}
// function create list language
function languege_list(){
	$list=['Khmer','English','Chinese','Japan','Thai'];
	$output = '<option style="display:none;" value="">Select Language</option>';
	foreach($list as $row)
	{
		$output .= '<option value="'.$row.'">'.$row.'</option>';
	}

	return $output;
}
function edition_list(){
	$list=['First','Second','Third','Fourth','Fifth','Sixth','Seventh','Eighth','Nineth','Tenth'];
	$output = '<option style="display:none;" value="">Select Edition</option>';
	foreach($list as $row)
	{
		$output .= '<option value="'.$row.'">'.$row.'</option>';
	}

	return $output;
}