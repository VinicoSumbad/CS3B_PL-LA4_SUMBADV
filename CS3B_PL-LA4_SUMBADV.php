<?php
// Creating an array to store the information
$studentInfo = [];

// Using array_push() to add items to the array
echo "Enter First Name: ";
$studentInfo[] = trim(fgets(STDIN));
echo "Enter Last Name: ";
$studentInfo[] = trim(fgets(STDIN));
echo "Enter Course: ";
$studentInfo[] = trim(fgets(STDIN));
echo "Enter Year Level: ";
$studentInfo[] = trim(fgets(STDIN));
echo "Enter Section: ";
$studentInfo[] = trim(fgets(STDIN));
echo "Enter Username: ";
$studentInfo[] = trim(fgets(STDIN));
echo "Enter Password: ";
$studentInfo[] = trim(fgets(STDIN));

// Making a pinCode variable
$pinCode = "";

// Using while loop to get the exact pin code, and continues to loop if it doesn't meet the required pin code
// Using strlen for convenient access and an easier way to get the number of digits
// I set the shortest pin code to 6 digits because I based it on the pin codes of banks, just like PNB, LAND BANK, etc.
while (true) {
    echo "Enter Pin Code (Max of 8 digits only): "; // Temps the user to enter a pin code of max digit of 8 digits
    $pinCode = trim(fgets(STDIN));

    if (strlen($pinCode) == 0) {
        echo "You must Enter a Pin Code, Try Again!\n"; // If the pin code is empty, temp the user to input a pin code
    } elseif (strlen($pinCode) > 8) {
        echo "Your Pin Code is too long, Try Again!\n"; // Temps the user if the pin code is too long
    } elseif (strlen($pinCode) < 6) {
        echo "Your Pin Code is too short, Try Again!\n"; // Also temps the user if the pin code is too short
    } else {
        echo "Pin Code Accepted!\n"; // Prints if it meets the required pin code
        break;
    }
}

echo "\nCONGRATULATIONS! REGISTRATION COMPLETED.\n\n"; // Congratulates the user

// Using while loop again to continuously loop the program if it doesn't meet the requirements that the condition is asking
while (true) {
    echo "Do you want to log in? "; // I used strtoupper for easier recognition, so it doesn't matter
    $choice = strtoupper(trim(fgets(STDIN)));           // how they typed it.

    if ($choice == "YES") { // If the choice equals "YES", it will run the code or program inside the if statement
        while (true) {
            echo "Input Username: "; // Making a variable to store the username
            $userName = trim(fgets(STDIN));
            echo "Input Password: "; // And another for password
            $password = trim(fgets(STDIN));

            if ($userName == $studentInfo[5] && $password == $studentInfo[6]) { // Condition: if the current password and username equals the newly typed password and username
                echo "\nUsername and Password has been Authenticated!\n";

                while (true) {
                    echo "Please enter your Pin Code: "; // Making a variable for the pin
                    $pin = trim(fgets(STDIN));
                    if ($pin == $pinCode) { // Same here just like the condition earlier, checks if the current pin equals the newly typed pin
                        echo "\nREGISTERED INFO\n";            // Printing the info using studentInfo[] and adding the number inside the square brackets
                        echo "First Name: {$studentInfo[0]}\n"; // Example: studentInfo[0] until studentInfo[5]
                        echo "Last Name: {$studentInfo[1]}\n";  // It starts with 0 because that's how an array works
                        echo "Course: {$studentInfo[2]}\n";
                        echo "Year Level: {$studentInfo[3]}\n";
                        echo "Section: {$studentInfo[4]}\n";
                        echo "Username: {$studentInfo[5]}\n";
                        break 2; // Break both loops
                    } else {
                        echo "Invalid Pin Code, Try Again!\n"; // If the user inputs invalid characters like numbers, special characters, etc.
                    }                                         // The program will ask the user to try again
                }
            } else {
                echo "Incorrect Username or Password, Try Again!\n"; // If either the username or password is incorrect it will temp the user
            }                                                        // to try again
        }
    } elseif ($choice == "NO") {
        echo "EXITING, THANK YOU AND HAVE A GREAT DAY!\n"; // If the choice is "NO", it will exit the program
        break;
    } else {
        echo "INVALID INPUT, PLEASE ENTER YES OR NO\n"; // If the user inputs invalid characters the program asks the user to try again
    }
}
