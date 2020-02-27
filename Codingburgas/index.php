<?php
function GetFolders()
{
    //Folders = / and the name of the folder where the index.php and the projects are.
    $FoldersYear = '/Codingburgas';
    //Getting every folder or file in current folder as array
    $FoldersYearArr = scandir($FoldersYear, 1);
    //checking every folder from the array
    foreach ($FoldersYearArr as $year) {
        //the file or the folder shouldn't be one of those(if you are not working on phpstorm or brainstorm IDE you can remove $year!='.idea')
        if ($year != 'index.php' && $year!='.idea' && $year!='.' && $year!='..' ) {
            //Here we set the the first array to be the year and then we go into the year folder and scan the folders or files there
            $ArrWithTheFolders[$year] = [];
            $FoldersEvent = $FoldersYear.'/'.$year;
            $FoldersEventArr=scandir($FoldersEvent,1);
            //checking every folder from the array with the year
            foreach ($FoldersEventArr as $event) {
                //the same if as above
                if ($event != 'index.php' && $event!='.idea' && $event!='.' && $event!='..' ) {
                    //here we set the events to be array in the year array and then scan for the teams in the events folders
                    $ArrWithTheFolders[$year][$event] = [];
                    $FoldersTeam = $FoldersYear.'/'.$year.'/'.$event;
                    $FoldersTeamArr = scandir($FoldersTeam, 1);
                    //checking every folder from the array with the events
                    foreach ($FoldersTeamArr as $team) {
                        //the same if as above
                        if ($team != 'index.php' && $team!='.idea' && $team!='.' && $team!='..' ) {
                            //putting the teams in the event array
                            $ArrWithTheFolders[$year][$event][] = $team;
                        }
                    }
                }
            }
        }
    }
    //returning the associative array
    return $ArrWithTheFolders;
}
